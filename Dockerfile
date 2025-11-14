# -----------------------------
# 1. PHP 8.2 + extensions
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
# 3. Composer install
# -----------------------------
WORKDIR /var/www

COPY composer.json composer.lock ./

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# -----------------------------
# 4. Copy project files
# -----------------------------
COPY . .

# -----------------------------
# 5. Vite build (optional)
# -----------------------------
RUN npm install && npm run build

# -----------------------------
# 6. Laravel permissions
# -----------------------------
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# -----------------------------
# 7. Start Command
# Railway sets PORT automatically
# -----------------------------
CMD php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
