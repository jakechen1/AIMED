import numpy as np

uniprot2name = {}
with open('uniprot_to_gene_name.txt') as fr:
    for line in fr:
        uniprot, name = line.split()
        uniprot2name[uniprot] = name
print(uniprot2name)

all_genes = []
PPIs = set()
with open('export_5.txt') as fr:
    for line in fr:
        if '5_STAR' in line:
            genea, geneb, _ = line.split()
            genea = genea.split('"')[1]
            geneb = geneb.split('"')[1]
            if genea in uniprot2name and geneb in uniprot2name:
                if uniprot2name[genea] <= uniprot2name[geneb]:
                    PPIs.add(uniprot2name[genea] + ',' + uniprot2name[geneb] + '\n')
                else:
                    PPIs.add(uniprot2name[geneb] + ',' + uniprot2name[genea] + '\n')

fw = open('export_5_gene_name.txt', 'w')
for ppi in PPIs:
    fw.write(ppi)
fw.close()
