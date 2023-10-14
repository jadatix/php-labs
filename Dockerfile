FROM php:7.4-apache

COPY . /usr/src/myapp

WORKDIR /usr/src/myapp

RUN docker-php-ext-install mysqli

EXPOSE 80

CMD [ "php", "-S", "0.0.0.0:80" ]
