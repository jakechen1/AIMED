# HAPPI3-FINER

## Dependencies
Create the environment from the environment.yml file:
```
conda env create -f environment.yml
```

## Data preparation
Follow the steps to prepare the tissue-specific datasets, which include (i) gene-level functional annotation ground-truth, (ii) gene-level protein-protein interactions, (iii) isoform amino acid sequences, (iv) conserved domains of isoforms derived from their sequences, (v) and isoform co-expression networks.:
- Extract the contents of the `./FINER/data.tar.gz` file.
```
cd FINER/
tar -zxvf data.tar.gz
```
- Run the `data_preprocess.sh` script to build co-expression networks of isoforms from their expression profiles in different RNA-seq experiments (measured in Transcripts Per Million or TPM), convert the isoform sequences, conserved domains to Numpy arrays for the use of the model, as well as build the Gene Ontology hierarchy. After which, the data for model training will be save in the `./FINER/data/input/` directory.
```
cd FINER/preprocessing/
sh data_preprocess.sh
```

## Model training
- Us the script to submit a model training job on the HPCC cluster.
```
cd FINER/src/
sbatch train_job.sh
```
