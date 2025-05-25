FROM php:8.3-fpm-alpine

RUN mkdir -p /var/www/html

RUN apk --no-cache add shadow && usermod -u 1000 www-data

ADD ./php/php.ini /usr/local/etc/php/php.ini