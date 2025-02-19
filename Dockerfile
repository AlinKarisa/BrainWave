# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Install ekstensi yang dibutuhkan Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Copy semua file proyek ke dalam container
COPY . /var/www/html

# Atur hak akses folder Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Set working directory
WORKDIR /var/www/html

# Jalankan Laravel dengan Apache
CMD ["apache2-foreground"]
