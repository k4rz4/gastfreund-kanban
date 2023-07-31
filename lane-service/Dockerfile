FROM php:8.0-fpm-alpine

WORKDIR /var/www

RUN docker-php-ext-install pdo pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000
