# Используем официальный образ PHP с Apache
FROM php:8.3-apache
# Копируем файлы из папки app в папку Apache
COPY ./app/ /var/www/html
# Указываем права на папку с проектом
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755  /var/www/html
# Устанавливаем дополнительные расширения PHP (при необходимости)
RUN docker-php-ext-install mysqli pdo_mysql
# Открываем порт 80 для доступа
EXPOSE 80
