#!/bin/bash -l

#SBATCH --nodes=1
#SBATCH --ntasks=1
#SBATCH --cpus-per-task=10
#SBATCH --mem=200G
#SBATCH --time=3-00:15:00     # 1 day and 15 minutes
#SBATCH --mail-type=ALL
#SBATCH --job-name='BTO_0000775'
#SBATCH -p gpu # This is the default partition, you can use any of the following; intel, batch, highmem, gpu
#SBATCH --gres=gpu:1

conda activate tensorflow-gpu

cd ~/bigdata/FINER_HAPPI3/FINER/src
python3.7 joint_train.py data BTO_0000775 major
#python3.7 joint_train.py data BTO_0000763 major #Lung
#python3.7 joint_train.py data BTO_0000562 major #Heart
#python3.7 joint_train.py data BTO_0001103 major #Skeletal muscle
#python3.7 joint_train.py data BTO_0001379 major #Thyroid gland
#python3.7 joint_train.py data BTO_0001078 major #Placenta
#python3.7 joint_train.py data BTO_0001363 major #Testis
#python3.7 joint_train.py data BTO_0001487 major #Adipose tissue
#python3.7 joint_train.py data BTO_0000141 major #Bone marrow
#python3.7 joint_train.py data BTO_0000648 major #Intestine
#python3.7 joint_train.py data BTO_0001253 major #Skin
#python3.7 joint_train.py data BTO_0001422 major #Uterine endometrium
#python3.7 joint_train.py data BTO_0000233 brain #Cerebral cortex
#python3.7 joint_train.py data BTO_0000232 brain #Cerebellum
#python3.7 joint_train.py data BTO_0001279 brain #Spinal cord
