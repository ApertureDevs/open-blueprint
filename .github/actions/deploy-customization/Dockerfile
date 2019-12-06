FROM alpine:3.10
RUN apk add --no-cache curl\
    && curl -o kustomize --location https://github.com/kubernetes-sigs/kustomize/releases/download/v3.1.0/kustomize_3.1.0_linux_amd64\
    && chmod +x kustomize\
    && mv kustomize /usr/bin/kustomize

COPY entrypoint.sh /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]