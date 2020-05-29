FROM ubuntu:20.04 AS symfony-installer
RUN apt update \
    && apt install -y wget \
    && wget https://get.symfony.com/cli/installer -O - | bash

FROM ubuntu:20.04 AS dockerize-installer
ENV DOCKERIZE_VERSION v0.6.1
RUN apt update \
    && apt install -y wget \
    && wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /root -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

FROM php:7.4 AS composer-installer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');"

FROM php:7.4
RUN apt update \
    && apt install -y git \
    && rm -rf /var/lib/apt/lists/*
RUN apt update \
    && apt install -y libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_pgsql
RUN apt update \
    && apt install -y unzip zlib1g-dev libzip-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

COPY --from=symfony-installer /root/.symfony/bin/symfony /usr/local/bin/symfony
COPY --from=composer-installer /composer.phar /usr/local/bin/composer
COPY --from=dockerize-installer /root/dockerize /usr/local/bin/dockerize