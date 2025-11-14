# -----------------------------
# 1. PHP 8.2 + extensii
# -----------------------------
FROM php:8.2-fpm

# Instalează dependințe PHP și Nginx
RUN apt-get update && apt-get install -y \
    nginx \
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
    && docker-php-ext-install pdo_mysql mbstring bcmath gd zip pcntl \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \

RUN sed -i 's/listen = .*/listen = 0.0.0.0:9000/' /usr/local/etc/php-fpm.d/www.conf

# -----------------------------
# 2. Node + NPM (pentru Vite)
# -----------------------------
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# -----------------------------
# 3. Setează folderul de lucru
# -----------------------------
WORKDIR /var/www
COPY . .
# -----------------------------
# 4. Copiază Composer files și instalează dependențe
# -----------------------------
COPY composer.json composer.lock ./

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# -----------------------------
# 5. Copiază toate fișierele proiectului
# -----------------------------


# -----------------------------
# 6. Build Vite
# -----------------------------
RUN npm install && npm run build

# -----------------------------
# 7. Permisiuni Laravel
# -----------------------------
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# -----------------------------
# 8. Copiază config Nginx
# -----------------------------
COPY ./nginx/default.conf /etc/nginx/sites-available/default

# -----------------------------
# 9. Expune portul 80
# -----------------------------
EXPOSE 80

# -----------------------------
# 10. Start command
# -----------------------------
CMD php artisan migrate --force && \
    service nginx start && \
    php-fpm
