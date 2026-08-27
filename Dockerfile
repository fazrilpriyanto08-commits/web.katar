FROM php:8.2-apache

# Install ekstensi sistem yang dibutuhkan Laravel & PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip

# Aktifkan mod_rewrite Apache untuk URL Laravel
RUN a2enmod rewrite

# Salin seluruh file project ke dalam container web server
COPY . /var/www/html

# Atur direktori kerja ke folder public Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -s 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -s 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Berikan izin akses folder storage dan bootstrap cache
RUN ch_perms() { chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache; }; ch_perms

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Jalankan composer install untuk mengunduh dependensi
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Expose port web
EXPOSE 80