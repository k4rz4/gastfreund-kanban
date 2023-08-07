FROM php:8.2-fpm-alpine

WORKDIR /var/www

# Install system dependencies and PHP extensions
RUN apk update && apk add --no-cache \
    build-base \
    autoconf \
    curl-dev \
    git \
 && docker-php-ext-install pdo pdo_mysql bcmath sockets \
 && apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    rabbitmq-c-dev \
 && pecl install amqp \
 && docker-php-ext-enable amqp \
 && apk del .build-deps

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000

EXPOSE 8000