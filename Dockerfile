FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

COPY . /var/www

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000
