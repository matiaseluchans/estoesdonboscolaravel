FROM php:8.0-fpm-alpine
RUN apk update && apk upgrade --no-cache

#install some base extensions
RUN apk add --no-cache zip libzip-dev libpng-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
RUN docker-php-ext-install gd
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /app
COPY . /app

RUN --mount=type=secret,id=DB_PASSWORD \
    sed -i "s,DB_PASSWORD=,DB_PASSWORD=$(cat /run/secrets/DB_PASSWORD),g" .env.example

RUN sed -i "s,APP_ENV=local,APP_ENV=production,g" .env.example
RUN mv .env.example .env

RUN composer install

RUN addgroup --gid 1001 -S donbosco && \
    adduser -G donbosco --shell /bin/false --disabled-password -H --uid 1001 donbosco

EXPOSE 8000
RUN php artisan key:generate
RUN chown -R donbosco:www-data storage
RUN chown -R donbosco:www-data bootstrap/cache

USER donbosco
CMD php artisan config:cache && php artisan serve --host=0.0.0.0 --port=8000