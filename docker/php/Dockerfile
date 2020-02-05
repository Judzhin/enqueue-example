FROM php:7.3-cli

RUN apt-get update && apt-get install -y librabbitmq-dev libpq-dev libicu-dev unzip wget git \
    && docker-php-ext-install sockets \
    && pecl install amqp xdebug \
    && docker-php-ext-enable amqp xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN wget https://getcomposer.org/installer -O - -q | php -- --install-dir=/bin --filename=composer --quiet

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www