# Gunakan PHP 8.2 dengan Apache
FROM php:8.2-apache

# Install ekstensi yang dibutuhkan Laravel
RUN apt-get update && apt-get install -y unzip libzip-dev && \
    docker-php-ext-install pdo pdo_mysql zip && \
    a2enmod rewrite

# Copy semua file ke container
COPY . /var/www/html

# Set working directory
WORKDIR /var/www/html

# Pastikan folder storage dan cache dapat ditulis
RUN chmod -R 775 storage bootstrap/cache

# Jalankan Composer jika belum ada vendor
RUN if [ ! -d "vendor" ]; then \
      php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
      php composer-setup.php && \
      php composer.phar install --no-dev --optimize-autoloader; \
    fi

# Set Apache DocumentRoot ke folder public Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update konfigurasi Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose port 80
EXPOSE 80

# Jalankan Apache
CMD ["apache2-foreground"]
