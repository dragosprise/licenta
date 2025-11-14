#!/bin/sh
set -e

echo "Waiting for DB..."

# Retry loop, dar doar max 30 secunde
counter=0
while ! php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT}', '${DB_USERNAME}', '${DB_PASSWORD}');" >/dev/null 2>&1; do
    counter=$((counter+1))
    if [ $counter -gt 15 ]; then
        echo "DB not reachable after 30s, exiting."
        exit 1
    fi
    echo "DB not ready, sleeping 2s..."
    sleep 2
done

echo "DB is ready."

# Laravel setup
php artisan package:discover
php artisan config:cache
php artisan route:cache
php artisan migrate --force

# Start php-fpm in foreground
php-fpm -F
