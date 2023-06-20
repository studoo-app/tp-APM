FROM php:8.1-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
     locales \
     apt-utils \
     git \
     libicu-dev \
     g++ \
     libpng-dev \
     libxml2-dev \
     libzip-dev \
     libonig-dev \
     libxslt-dev \
     libssh-dev

RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# Composer
RUN echo "Installation de composer"
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

#Docker extension
RUN echo "Installation et configuration des extensions"
RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl
RUN pecl install apcu xdebug && docker-php-ext-enable apcu xdebug

#Ouverture des droits de lecture, modification et execution
RUN echo "Ouverture des droits de lecture, modification et execution"
RUN chmod 777 -R /var/www

# Configuration du WORKDIR
RUN echo "Configuration du WORKDIR"
WORKDIR /var/www/
