FROM php:7.4-fpm

ARG DIST_DIR

RUN apt update \
    && apt install -y libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_pgsql

COPY $DIST_DIR /app

COPY .deploy/docker/api-php/pod-start.sh /pod-start.sh

RUN chmod +x /pod-start.sh

WORKDIR /app
