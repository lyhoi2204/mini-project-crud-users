FROM php:7.2-fpm

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y zip mysql-client

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN docker-php-ext-install pdo pdo_mysql

RUN chmod +x /app/.docker/web/docker_entrypoint.sh

ENTRYPOINT ["/app/.docker/web/docker_entrypoint.sh"]

EXPOSE 8000
