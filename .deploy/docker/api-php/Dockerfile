FROM php:7.4-fpm

ARG DIST_DIR

RUN apt update \
    && apt install -y libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_pgsql

RUN apt update \
    && apt install -y libicu-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN apt update \
    && apt install -y librabbitmq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && pecl install amqp \
    && docker-php-ext-enable amqp

RUN docker-php-ext-install opcache

COPY $DIST_DIR /app

COPY .deploy/docker/api-php/pod-start.sh /pod-start.sh

RUN chmod +x /pod-start.sh

WORKDIR /app
