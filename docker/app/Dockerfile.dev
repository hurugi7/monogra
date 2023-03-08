
FROM php:7.4-apache

COPY php.ini /usr/local/etc/php/
COPY 000-default.conf /etc/apache2/sites-enabled/

ARG USERNAME=hurugi7
ARG GROUPNAME=hurugi7
ARG UID=1000
ARG GID=1000

RUN apt-get update \
&& apt-get install -y \
git \
zip \
unzip \
vim \
libpng-dev \
libpq-dev \
&& docker-php-ext-install pdo_mysql \
&& groupadd -g $GID $GROUPNAME && \
useradd -m -s /bin/bash -u $UID -g $GID $USERNAME


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite
