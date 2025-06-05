# Menggunakan image PHP + Apache
FROM php:8.1-apache

# Install ekstensi mysqli
RUN docker-php-ext-install mysqli

# Copy semua file dari folder sekarang ke /var/www/html (folder default Apache)
COPY . /var/www/html/

# Buka port 80
EXPOSE 80
