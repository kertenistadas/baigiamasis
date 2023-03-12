FROM php:8.2.3-fpm-alpine

RUN addgroup -g 1000 -S app && \
    adduser -u 1000 -S app -G app

RUN apk add \
    autoconf \
    build-base \
    git

RUN pecl install apcu-5.1.22 \
    && docker-php-ext-install mysqli \
    && docker-php-ext-enable apcu opcache mysqli

COPY --from=composer:2.5.3 /usr/bin/composer /usr/local/bin/composer

WORKDIR /srv/app
