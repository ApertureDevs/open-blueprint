FROM ubuntu:20.04 AS symfony-installer
RUN apt update \
    && apt install -y wget \
    && wget https://get.symfony.com/cli/installer -O - | bash

FROM php:7.4
RUN apt update \
    && apt install -y libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pdo pdo_pgsql
COPY --from=symfony-installer /root/.symfony/bin/symfony /usr/local/bin/symfony
EXPOSE 8000
CMD ["symfony", "serve"]
