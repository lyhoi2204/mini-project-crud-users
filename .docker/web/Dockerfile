FROM php:7.2-fpm

WORKDIR /app

COPY . .

RUN apt-get update && apt-get install -y zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN docker-php-ext-install pdo pdo_mysql

CMD php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000
