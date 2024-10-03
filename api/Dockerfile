FROM php:8.3-apache
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install zip

# Set workign dir
WORKDIR /var/www

# Copy existing application dir contents
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install dependencies
RUN composer install

CMD ["php", "artisan", "migrate", "--seed"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9000"]
EXPOSE 9000
