FROM golang:1
RUN GO111MODULE=on go get sigs.k8s.io/kustomize/kustomize/v3

COPY entrypoint.sh /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
