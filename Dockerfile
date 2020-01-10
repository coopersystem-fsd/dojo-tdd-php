FROM php:7.4.1-fpm-alpine

RUN apk update
RUN apk add --no-cache openssl bash nodejs npm postgresql-dev
RUN docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/bin --filename=composer

COPY .docker/nginx/nginx.conf /etc/nginx/conf.d/

EXPOSE 80
ENTRYPOINT ["php-fpm"]
