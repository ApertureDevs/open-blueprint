FROM ubuntu:20.04 AS symfony-installer
RUN apt update \
    && apt install -y wget \
    && wget https://get.symfony.com/cli/installer -O - | bash

FROM php:7.4
ARG XDEBUG_VERSION=2.9.6
ENV XDEBUG_IDE_KEY='serverName=local.api.openblueprint.aperturedevs.com'
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
RUN pecl install xdebug-${XDEBUG_VERSION}
RUN docker-php-ext-install opcache
COPY php.ini /usr/local/etc/php/
COPY --from=symfony-installer /root/.symfony/bin/symfony /usr/local/bin/symfony
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
EXPOSE 8000
ENTRYPOINT ["/entrypoint.sh"]
CMD ["symfony", "serve"]
