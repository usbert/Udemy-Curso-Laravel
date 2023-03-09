FROM php:8.2-rc-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y git && apt-get install zip unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Set working directory
WORKDIR /var/www
