#!/bin/sh

cd /var/www


sh -c "sleep 30 && php artisan migrate:fresh --seed"

php artisan cache:clear
php artisan config:cache
php artisan route:cache

php artisan serve --host=0.0.0.0 --port=9000
