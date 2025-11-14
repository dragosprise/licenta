#!/bin/sh
set -e

echo "Starting Laravel container..."

# Descoperă clasele Laravel și cache
php artisan package:discover
php artisan config:cache
php artisan route:cache

# Rulează migrările (opțional, dacă vrei să fie automate)
php artisan migrate --force

# Pornește php-fpm
php-fpm
