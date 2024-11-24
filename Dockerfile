FROM php:8.2-fpm


RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql mbstring zip bcmath



COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY .envDev .env

WORKDIR /var/www/html
COPY . .


RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
RUN composer install --no-dev --optimize-autoloader


EXPOSE 9000

CMD ["php-fpm"]
