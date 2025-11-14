# PHP 8.2 + extensions
FROM php:8.2-fpm

# System dependencies
RUN apt-get update && apt-get install -y \
    git curl unzip zip libpng-dev libonig-dev libxml2-dev libzip-dev libjpeg62-turbo-dev libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd zip pcntl

# Node.js pentru Vite
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www

# Copy proiect
COPY . .

# Composer install fără scripts
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer install --no-dev --no-interaction --prefer-dist --no-scripts

# Build Vite assets
RUN npm install && npm run build

# Fix permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
