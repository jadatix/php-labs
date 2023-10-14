FROM php:7.4-apache

RUN apt-get update && apt upgrade -y
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli

COPY ./ /var/www/html/

RUN service apache2 restart

EXPOSE 80

CMD [ "php", "-S", "0.0.0.0:80" ]
