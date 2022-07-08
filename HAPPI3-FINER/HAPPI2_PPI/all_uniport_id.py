import numpy as np

all_genes = []
with open('export_5.txt') as fr:
    for line in fr:
        if '5_STAR' in line:
            genea, geneb, _ = line.split()
            genea = genea.split('"')[1]
            all_genes.append(genea)
            geneb = geneb.split('"')[1]
            all_genes.append(geneb)
print(len(set(all_genes)))

fw = open('all_uniprot.txt', 'w')
for gene in set(all_genes):
    fw.write(gene + '\n')
fw.close()
