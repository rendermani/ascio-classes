FROM php:7.2-fpm
RUN apt-get update && apt-get -y install libpng-dev zip libxml2-dev git zip zlib1g-dev mysql-client libicu-dev
RUN  docker-php-ext-configure intl\
	&& docker-php-ext-install gd pdo_mysql soap zip intl

WORKDIR /code

RUN curl --silent --show-error https://getcomposer.org/installer | php
RUN mv  /code/composer.phar /usr/local/bin/composer

RUN yes | pecl install xdebug apcu \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=on" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.remote_host=10.0.75.1" >> /usr/local/etc/php/conf.d/xdebug.ini\
    && echo "xdebug.remote_log=/var/log/xdebug" >> /usr/local/etc/php/conf.d/xdebug.ini
WORKDIR /code