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
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo pdo_mysql

# Set workign dir
WORKDIR /var/www/html

# Copy existing application dir contents
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy php config
RUN cp docker/conf/php.ini /usr/local/etc/php/conf.d/app.ini

# PHP Error Log Files
RUN mkdir /var/log/php
RUN touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log

# Install dependencies
RUN composer install

RUN php artisan key:generate

EXPOSE 9000

ENTRYPOINT ["/var/www/html/docker/run.sh"]
