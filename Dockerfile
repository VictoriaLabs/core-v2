# Utilisez l'image officielle PHP en tant qu'image de base
FROM php:latest

RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql zip

WORKDIR /var/www/html
