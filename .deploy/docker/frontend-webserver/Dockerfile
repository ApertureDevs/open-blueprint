FROM nginx:1

ARG DIST_DIR

COPY .deploy/docker/frontend-webserver/nginx.conf /etc/nginx/conf.d/default.conf

COPY $DIST_DIR /app

WORKDIR /app
