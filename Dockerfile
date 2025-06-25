# Dockerfile

FROM php:8.2-apache

# Cài các thư viện cần thiết
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl npm \
    && docker-php-ext-install pdo pdo_mysql zip

# Bật mod_rewrite cho Laravel routing
RUN a2enmod rewrite

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Copy mã nguồn vào container
COPY . .

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN npm install && npm run build
# Cài gói PHP Laravel
RUN composer install --no-dev --optimize-autoloader

# Gán quyền cho Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Mở port 80 (web chạy)
EXPOSE 80

# Khởi động Apache
CMD ["apache2-foreground"]
