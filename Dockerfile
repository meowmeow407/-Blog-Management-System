FROM php:8.3-apache

# Install system dependencies & PHP extensions for BOTH MySQL and PostgreSQL
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git unzip libpq-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_mysql pdo_pgsql gd

# Enable Apache Rewrite for routing
RUN a2enmod rewrite

# Change Apache document root to Laravel's public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Copy all your project files into the container
COPY . /var/www/html/

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Clear local composer state and install clean dependencies
RUN cd /var/www/html && \
    rm -f composer.lock && \
    composer install --no-dev --no-scripts --optimize-autoloader

# Set permissions for Laravel storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

# Force cache to use files temporarily so it stops looking for a database table that isn't created yet
CMD cd /var/www/html && \
    PHP_CLI_SERVER_WORKERS=1 CACHE_STORE=file SESSION_DRIVER=file php artisan config:clear && \
    PHP_CLI_SERVER_WORKERS=1 CACHE_STORE=file SESSION_DRIVER=file php artisan cache:clear && \
    php artisan migrate --force && \
    php artisan config:cache && \
    apache2-foreground