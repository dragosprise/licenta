#!/bin/sh
set -e

echo "Waiting for DB..."

# Retry loop pentru DB
while ! php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT}', '${DB_USERNAME}', '${DB_PASSWORD}');" >/dev/null 2>&1; do
    echo "DB not ready, sleeping 2s..."
    sleep 2
done

echo "DB is ready, running migrations..."

php artisan package:discover
php artisan config:cache
php artisan route:cache
php artisan migrate --force

echo "Starting php-fpm..."
php-fpm -F
