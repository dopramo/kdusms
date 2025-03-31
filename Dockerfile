# Use PHP + Apache base image
FROM php:8.1-apache

# Install required PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Set working directory
WORKDIR /var/www/html

# Copy project files to container
COPY . /var/www/html

# Install dependencies using Composer
RUN apt-get update && apt-get install -y unzip git && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install

# Expose port 80
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
