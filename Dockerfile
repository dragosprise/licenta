# -----------------------------
# 1. PHP 8.2 + extensii necesare
# -----------------------------
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    zip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd zip pcntl

# -----------------------------
# 2. Node + NPM (pentru Vite)
# -----------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# -----------------------------
# 3. Set working directory
# -----------------------------
WORKDIR /var/www

# -----------------------------
# 4. Copiere composer files + install
# -----------------------------
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# -----------------------------
# 5. Copiere proiect
# -----------------------------
COPY . .

# -----------------------------
# 6. Build assets cu Vite
# -----------------------------
RUN npm install && npm run build

# -----------------------------
# 7. Set permissions pentru storage și cache
# -----------------------------
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# -----------------------------
# 8. Expose port-ul pentru Railway
# -----------------------------
EXPOSE 8000

# -----------------------------
# 9. Entrypoint pentru Laravel
# -----------------------------
# Rulează migrațiile și pornește PHP-FPM
CMD php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php-fpm
