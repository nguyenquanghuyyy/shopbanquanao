FROM php:8.2-apache

# Cài các thư viện cần thiết cho Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl npm \
    && docker-php-ext-install pdo pdo_mysql zip

# Bật rewrite module để Laravel routing hoạt động
RUN a2enmod rewrite

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel sẽ được đặt tại /var/www
WORKDIR /var/www

# Copy toàn bộ source code vào container
COPY . .

# Laravel chạy trong thư mục public, sửa cấu hình Apache lại cho đúng
RUN sed -i 's|/var/www/html|/var/www/public|g' /etc/apache2/sites-available/000-default.conf

# Cài thư viện frontend nếu có (vite, tailwind...)
RUN npm install && npm run build || true

# Cài các gói PHP bằng composer
RUN composer install --no-dev --optimize-autoloader

# Gán quyền ghi cho Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Nếu bạn muốn generate key tại đây luôn (nếu chưa có sẵn)
# RUN php artisan key:generate

EXPOSE 80
CMD ["apache2-foreground"]
