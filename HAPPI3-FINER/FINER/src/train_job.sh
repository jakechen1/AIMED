#!/bin/bash -l

#SBATCH --nodes=1
#SBATCH --ntasks=1
#SBATCH --cpus-per-task=10
#SBATCH --mem=200G
#SBATCH --time=3-00:15:00     # 1 day and 15 minutes
#SBATCH --mail-user=hchen069@ucr.edu
#SBATCH --mail-type=ALL
#SBATCH --job-name='BTO_0000775'
#SBATCH -p gpu # This is the default partition, you can use any of the following; intel, batch, highmem, gpu
#SBATCH --gres=gpu:1

conda activate tensorflow-gpu

cd ~/bigdata/FINER_HAPPI3/FINER/src
python3.7 joint_train.py data BTO_0000775 major
