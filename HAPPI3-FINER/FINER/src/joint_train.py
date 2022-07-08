"""main function
"""

import numpy as np
import tensorflow as tf
from encoder import Encoder
from predictor import Predictor
from scipy.sparse import csr_matrix
import util
import net_util
import networkx as nx
import copy
from sys import argv
import os
import matplotlib
import time
matplotlib.use('Agg')
import matplotlib.pyplot as plt
from sklearn.metrics import roc_auc_score, average_precision_score

if len(argv) > 3:
    folder = argv[1]
    tissue_id = argv[2]
    dataset = '/' + argv[3]
else:
    folder = argv[1]
    tissue_id = argv[2]
    dataset = ''

def train_predictor(predictor, X_train_seq, X_train_dm, y_train, X_test_seq,
                    X_test_dm, y_test, X_train_geneid, X_test_geneid, go,
                    np_ratios, eval_repeats, bag_indexes, go_hier, pre_ce_loss,
                    geneid, cur_iter, iii_net, learning_curve_auc,
                    learning_curve_auprc, tissue_id):
    learning_curve_auc, learning_curve_auprc, func_feature, pre_ce_loss = predictor.train(
        X_train_seq, X_train_dm, y_train, X_test_seq, X_test_dm, y_test,
        X_train_geneid, X_test_geneid, go, np_ratios, eval_repeats,
        bag_indexes, go_hier, pre_ce_loss, geneid, cur_iter, iii_net,
        learning_curve_auc, learning_curve_auprc)

    prediction, _ = predictor.inference(X_train_seq, X_train_dm, go_hier)

    label_update = np.zeros(y_train.shape)
    for i in range(int(np.max(bag_indexes))):
        idx = np.where(bag_indexes == i)[0]
        if len(idx) == 0:
            continue
        bag_labels = np.max(y_train[idx, :], axis=0)
        for lb in range(y_train.shape[-1]):
            if bag_labels[lb] == 1:
                pos_idx = np.where(prediction[idx, lb] >= 0.0)[0]
                if len(pos_idx) == 0:
                    pos_idx = np.argmax(prediction[idx, lb])
                label_update[idx[pos_idx], lb] = 1
            elif bag_labels[lb] == -1:
                label_update[idx, lb] = -1

    return predictor, learning_curve_auc, learning_curve_auprc, label_update, prediction, func_feature, pre_ce_loss


def train_encoder(encoder, X_train_expression, batch_indexes, cur_iter, geneid, isoid, y_train,
                  y_test, func_feature, last_p):
    iii_net, pred_prob, idx2isoidx, last_p = encoder.train(X_train_expression, batch_indexes, cur_iter,
                            geneid, isoid, y_train, y_test, func_feature, last_p)
    return iii_net, pred_prob, idx2isoidx, last_p


def evaluate_III_pred_perf_gene(test_set_edges, iii_prob, idx2isoidx, ppi_net, iter, tissue_id, geneid, isoid):
    gene_iso_dict = {}
    iso_gene_dict = {}
    for gene in set(geneid):
        idx = np.where(geneid == gene)[0]
        gene_iso_dict[gene] = idx
        for id in idx:
            iso_gene_dict[id] = gene

    y_pred_mean = []
    y_pred_max = []
    y_true = []
    pos_edge = 0
    isoidx2idx = {idx:i for i,idx in enumerate(idx2isoidx)}
    genepair_scores = {}
    for edge in test_set_edges:
        node1, node2 = edge
        gene1 = iso_gene_dict[node1]
        gene2 = iso_gene_dict[node2]
        geneA = min(gene1, gene2)
        geneB = max(gene1, gene2)
        if geneA + ':' + geneB not in genepair_scores and ppi_net.degree(node1) > 0 and ppi_net.degree(node2) > 0:
            genepair_scores[geneA + ':' + geneB] = [iii_prob[isoidx2idx[node1], isoidx2idx[node2]]]
        elif ppi_net.degree(node1) > 0 and ppi_net.degree(node2) > 0:
            genepair_scores[geneA + ':' + geneB].append(iii_prob[isoidx2idx[node1], isoidx2idx[node2]])
    for pair in genepair_scores:
        y_pred_mean.append(np.mean(genepair_scores[pair]))
        y_pred_max.append(np.max(genepair_scores[pair]))
        y_true.append(1)
        pos_edge += 1
        #print('pos', np.max(genepair_scores[pair]))

    for i in range(pos_edge):
        randi = np.random.randint(len(ppi_net.nodes()))
        randj = np.random.randint(len(ppi_net.nodes()))
        if ppi_net.degree(randi) > 0 and ppi_net.degree(randj) > 0 and not ppi_net.has_edge(randi, randj):
            genei = iso_gene_dict[randi]
            genej = iso_gene_dict[randj]
            scores = []
            for isoa in gene_iso_dict[genei]:
                for isob in gene_iso_dict[genej]:
                    scores.append(iii_prob[isoidx2idx[isoa],isoidx2idx[isob]])
            y_pred_mean.append(np.mean(scores))
            y_pred_max.append(np.max(scores))
            y_true.append(0)
            #print('neg', iii_prob[isoidx2idx[randi],isoidx2idx[randj]])

    auc_mean = roc_auc_score(y_true, y_pred_mean)
    auc_max = roc_auc_score(y_true, y_pred_max)

    fw = open('../results/III_optimized/tissue_iii_optimized_' + tissue_id + '_' + str(iter) + '.tsv', 'w')
    r, c = np.where(iii_prob >= 0.95)
    for i in range(len(r)):
        if r[i] <= c[i]:
            fw.write(geneid[idx2isoidx[r[i]]] + '\t' + isoid[idx2isoidx[r[i]]] + '\t' + geneid[idx2isoidx[c[i]]] + '\t' + isoid[idx2isoidx[c[i]]] + '\t' + str(iii_prob[r[i], c[i]]) + '\n')
    fw.close()
    np.save('../results/III_optimized/tissue_iii_optimized_mat_' + tissue_id + '_' + str(iter) + '.npy', iii_prob)

    return auc_mean, auc_max

def main():
    tf.compat.v1.disable_eager_execution()
    model_save_dir = '../saved_models'
    outer_iterations = 4
    tissue, tissue_gos = util.get_tissue_go(tissue_id, folder)
    print('tissue: ' + tissue_id + ' ' + tissue)

    X_train_seq, X_train_dm, X_test_seq, X_test_dm, X_train_geneid, \
    X_train_isoid, X_test_geneid, X_test_isoid, X_train_expression = util.get_data(
        tissue_id, folder, dataset)

    positive_gene_map = util.pos_gene_set(folder, tissue_gos)
    y_train, y_test, np_ratios, eval_repeats, go, go_hier = \
    util.generate_multi_label(
        tissue_id, folder, X_train_geneid, X_test_geneid, positive_gene_map)
    func_class_num = y_train.shape[1]

    X_train_seq = np.vstack((X_train_seq, X_test_seq))
    X_train_dm = np.vstack((X_train_dm, X_test_dm))
    y_train = np.vstack((y_train, -1 * np.ones(y_test.shape)))
    geneid = np.hstack((X_train_geneid, X_test_geneid))
    isoid = np.hstack((X_train_isoid, X_test_isoid))
    geneid_set = list(set(list(geneid)))

    instance_to_bag = np.zeros(len(geneid))
    gene_num = 0
    for id in geneid_set:
        idx = np.where(geneid == id)
        instance_to_bag[idx] = gene_num
        gene_num += 1
    instance_to_bag = instance_to_bag.astype(int)

    print(y_train.shape, y_test.shape)
    print('Training model for ' + tissue_id)

    fr = open('../hyper_prms/functional_predictor_hprms.txt')
    functional_predictor_config = eval(fr.read())
    functional_predictor_config['class_num'] = func_class_num
    fr.close()
    fr = open('../hyper_prms/network_encoder_hprms.txt')
    network_encoder_config = eval(fr.read())
    fr.close()

    print('functional_predictor_config', functional_predictor_config)
    print('network_encoder_config', network_encoder_config)

    predictor = Predictor(functional_predictor_config)
    saver = tf.compat.v1.train.Saver()

    # Read tissue specific ppi
    ppi_file_name = '../../HAPPI2_PPI/export_5_gene_name.txt'
    iii_net, genes_with_edges, test_set_edges = net_util.read_net(ppi_file_name, len(geneid),
                                                  geneid)
    print(len(iii_net.nodes()))
    ppi_net = copy.deepcopy(iii_net)

    encoder = Encoder(network_encoder_config, iii_net)

    print('training model...')
    learning_curve_auc = []
    learning_curve_auprc = []
    pre_ce_loss = np.float('inf')

    nodes_idx = []
    for i in range(len(iii_net.nodes())):
        if iii_net.degree(i) > 0:
            nodes_idx.append(i)
    last_p = nx.to_numpy_array(iii_net, nodelist=nodes_idx)
    for it in range(outer_iterations):
        print('Iteration:', it)

        # Train functional part
        predictor.set_parameters(it)
        predictor, learning_curve_auc, learning_curve_auprc, y_train, prediction, func_feature, pre_ce_loss = train_predictor(
            predictor, X_train_seq, X_train_dm, y_train, X_test_seq, X_test_dm,
            y_test, X_train_geneid, X_test_geneid, go, np_ratios,
            eval_repeats, instance_to_bag, go_hier, pre_ce_loss, geneid, it,
            iii_net, learning_curve_auc, learning_curve_auprc, tissue_id)

        ckpt_path = "../saved_models/saved_ckpt/" + tissue_id + "_iter" + str(it)
        if not os.path.exists(ckpt_path):
            os.makedirs(ckpt_path)
        saver.save(predictor.sess, save_path=ckpt_path + "/predictor.ckpt")

        # Train network part
        iii_net, pred_prob, idx2isoidx, last_p = train_encoder(
            encoder, X_train_expression, instance_to_bag, it,
            geneid, isoid, y_train, y_test, func_feature, last_p)

        # Evaluate on masked linkages
        auc_mean, auc_max = evaluate_III_pred_perf_gene(test_set_edges, pred_prob, idx2isoidx, ppi_net, it, tissue_id, geneid, isoid)
        print('AUC by averaging isoform pairs', auc_mean)
        print('AUC by taking the maximum of isoform pairs', auc_max)

    print('Saving model and results...')
    ckpt_path = '../saved_models/' + tissue_id + '_predictor_final'
    if not os.path.exists(ckpt_path):
        os.makedirs(ckpt_path)
    saver.save(predictor.sess, save_path=ckpt_path + '/predictor.ckpt')

    predictor.sess.close()
    encoder.sess.close()


if __name__ == "__main__":
    main()
