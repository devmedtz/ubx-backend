# Set the base image for subsequent instructions
FROM php:8.1

# Install system dependencies
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        graphviz \
        git \
        curl \
        zip \
        unzip \
    && docker-php-source delete \
    && curl -sS https://getcomposer.org/installer | php -- \ --install-dir=/usr/local/bin --filename=composer

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mysqli mbstring exif pcntl bcmath gd sockets zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /ubx/app

COPY . /ubx/app

RUN composer install

RUN php artisan view:clear

RUN php artisan optimize


