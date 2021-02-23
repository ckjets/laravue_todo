FROM php:7.3.7-fpm-alpine
# Labelでauther
LABEL maintainer "ck_jets"

# Argで引数を受け取る（.envから）
ARG TZ
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer

RUN set -eux && \
    #docker-php-ext-install bcmath pdo_mysql && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer && \
    composer install

# RUN php artisan