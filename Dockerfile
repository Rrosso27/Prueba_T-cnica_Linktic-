# Tu imagen PHP base
FROM php:8.1-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    unzip \
    libzip-dev \
&& docker-php-ext-install pdo pdo_mysql zip

# Copiar archivos del proyecto
WORKDIR /var/www
COPY . .

# Eliminar residuos previos
RUN rm -rf vendor composer.lock

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader


# Configuración del directorio de trabajo
WORKDIR /var/www

# Copia los archivos de la aplicación
COPY . .

# Instala las dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Da permisos de escritura al directorio de almacenamiento
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Exponer el puerto
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
