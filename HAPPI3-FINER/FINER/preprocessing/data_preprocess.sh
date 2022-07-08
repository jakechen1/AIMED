#!/bin/bash

python3.7 generate_go_hierarchy.py data
python3.7 seq_dataset_human.py data major
python3.7 seq_dataset_human.py data brain
python3.7 domain_dataset.py data major
python3.7 domain_dataset.py data brain
python3.7 construct_coexp_net.py data major
python3.7 construct_coexp_net.py data brain
