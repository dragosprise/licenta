# -----------------------------
# 1. PHP 8.2 + extensions
# -----------------------------
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libonig-dev libxml2-dev libzip-dev libjpeg62-turbo-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd zip pcntl

# -----------------------------
# 2. Node.js pentru Vite
# -----------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# -----------------------------
# 3. Set working directory
# -----------------------------
WORKDIR /var/www

# -----------------------------
# 4. Copy project
# -----------------------------
COPY . .

# -----------------------------
# 5. Composer install fara scripts
# -----------------------------
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer install --no-dev --no-interaction --prefer-dist --no-scripts

# -----------------------------
# 6. Build assets Vite
# -----------------------------
RUN npm install && npm run build

# -----------------------------
# 7. Fix permissions
# -----------------------------
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# -----------------------------
# 8. Ensure ENTRYPOINT allows CMD
# -----------------------------
ENTRYPOINT ["sh", "-c"]

# -----------------------------
# 9. Start Laravel
# -----------------------------
CMD php artisan package:discover && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
    npm run dev
