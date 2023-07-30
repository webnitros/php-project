ARG PHP_VERSION=7.4

FROM php:$PHP_VERSION-fpm-alpine

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk update && apk upgrade
RUN apk add build-base autoconf libzip-dev libpng-dev libjpeg-turbo-dev libwebp-dev bash mariadb-client mc nano sudo

# Install cron
RUN apk add --no-cache dcron

#RUN pecl install xdebug-3.1.0
RUN docker-php-ext-configure gd --with-jpeg --with-webp && docker-php-ext-install gd
RUN docker-php-ext-install exif
RUN docker-php-ext-install zip
RUN docker-php-ext-install bz2
RUN docker-php-ext-install pdo_mysql


# Установка и включение расширения GD
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) gd

RUN composer global config minimum-stability alpha
ENV PATH=/root/.composer/vendor/bin:$PATH

# копируем директорию с сайтом
COPY . /var/www/html

RUN composer install --no-dev --no-interaction --no-scripts

CMD php-fpm -R
