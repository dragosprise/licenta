# -----------------------------
# PHP + extensions
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
# NodeJS pentru Vite
# -----------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# -----------------------------
# WORKDIR
# -----------------------------
WORKDIR /var/www

# -----------------------------
# Copy tot proiectul
# -----------------------------
COPY . .

# -----------------------------
# Install Composer
# -----------------------------
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# -----------------------------
# Composer install (dupa copy)
# -----------------------------
RUN composer install --no-dev --no-interaction --prefer-dist

# -----------------------------
# Vite build
# -----------------------------
RUN npm install && npm run build

# -----------------------------
# FIX PERMISSIONS
# -----------------------------
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# -----------------------------
# Start command
# -----------------------------
CMD php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
