# Use the official PHP image with Apache
FROM php:7.4-apache

# Set working directory
WORKDIR /var/www/html

# Install necessary PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy the current directory contents into the container at /var/www/html
COPY . /var/www/html

# Install Composer (for managing PHP dependencies)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install project dependencies via Composer
RUN composer install

# Expose port 80 for the web server
EXPOSE 80

# Set the default command to run Apache in the foreground
CMD ["apache2-foreground"]
