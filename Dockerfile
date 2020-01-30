FROM php:7.2-apache-stretch as base

WORKDIR /srv/app

COPY build/vhost.conf /etc/apache2/sites-available/000-default.conf
ENV APACHE_DOCUMENT_ROOT /srv/app/public

RUN apt-get update -yq \
    && apt-get install -yq libzip-dev zip libmemcached-dev zlib1g-dev mc mysql-client libwebp-dev libpng-dev libjpeg62-turbo-dev libicu-dev cron sudo \
    && pecl install memcached-3.0.4 \
    && pecl install -o -f redis \
    && docker-php-ext-enable memcached \
    && docker-php-ext-enable redis \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip  pdo_mysql \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-configure gd --with-jpeg-dir=/usr/include/ --with-webp-dir=/usr/include/ \
    && docker-php-ext-install gd exif \
    && docker-php-ext-enable opcache \
    && a2enmod rewrite

COPY build/cron.conf /etc/cron.d/me_cron
RUN chmod 644 /etc/cron.d/me_cron

COPY ./build/php.opcache_off.ini /usr/local/etc/php/conf.d/php.ini
COPY --chown=www-data:www-data ./src /srv/app

RUN chown -R www-data:www-data /srv/app/storage

COPY --from=composer:1.8 /usr/bin/composer /usr/bin/composer

EXPOSE 80

CMD ["apache2-foreground"]
