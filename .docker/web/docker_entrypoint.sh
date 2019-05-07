#!/bin/sh

while ! mysqladmin ping -h"$DB_HOST" --silent; do
    sleep 1
done

echo "Mysql is ready!"

php artisan migrate

php artisan serve --host=0.0.0.0 --port=8000
