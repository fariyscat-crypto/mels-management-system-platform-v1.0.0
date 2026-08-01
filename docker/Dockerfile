FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    curl \
    libonig-dev \
    libxml2-dev \
    libicu-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql zip intl bcmath opcache

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY composer.json ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress

COPY . .

RUN if [ ! -f .env ]; then cp .env.example .env; fi
RUN php artisan key:generate --ansi
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 9000
CMD ["php-fpm"]
