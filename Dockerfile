# Используем официальный образ PHP с Apache
FROM php:8.3-apache
# Установим Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# Копируем файлы из папки app в папку Apache
COPY ./app/ /var/www/html
# Указываем права на папку с проектом
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755  /var/www/html
# Устанавливаем дополнительные расширения PHP (при необходимости)
RUN docker-php-ext-install mysqli pdo_mysql
# Устанавливаем zip, unzip и git для работы Composer
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    && rm -rf /var/lib/apt/lists/*
# Открываем порт 80 для доступа
EXPOSE 80
