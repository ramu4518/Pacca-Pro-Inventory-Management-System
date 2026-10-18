
FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo_mysql

COPY htdocs/ /var/www/html/

EXPOSE 80
