#!/bin/sh

deploy_directory=$1
stage=$2
commit_hash=$3

echo "Kubernetes config files customization..."

cd ${deploy_directory}/overlays/${stage}
$(kustomize edit set image eu.gcr.io/aperture-devs/obp-frontend-webserver:${commit_hash})
$(kustomize edit set image eu.gcr.io/aperture-devs/obp-api-php:${commit_hash})
kustomize build -o ./../../manifest.yaml
echo ::set-output name=manifest-path::${deploy_directory}/manifest.yaml
echo "Kubernetes config files customization done"
