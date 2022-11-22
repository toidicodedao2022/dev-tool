FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
		libfreetype6-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
        zip\
        libssl-dev\
        pkg-config\
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd\
    && docker-php-ext-install pdo_mysql pdo\
    && pecl install mongodb && docker-php-ext-enable mongodb

VOLUME /var/www/html
WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version