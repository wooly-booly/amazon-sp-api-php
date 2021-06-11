FROM php:7.2.5-fpm

# Install extensions
## imagick
RUN apt-get update && apt-get install -y git
# && apt-get install -y libmagickwand-dev --no-install-recommends && rm -rf /var/lib/apt/lists/*
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync
# && install-php-extensions imagick zip
#RUN docker-php-ext-enable imagick zip
#RUN docker-php-ext-install pdo pdo_mysql gd
## xdebug
RUN pecl install xdebug-3.0.4 && docker-php-ext-enable xdebug

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHP configs
COPY php.ini /usr/local/etc/php/conf.d/php.ini

# Add user
WORKDIR /var/www/sp-api

RUN groupadd -g 1002 www
RUN useradd -u 1002 -ms /bin/bash -g www www

USER www

# Aliases
RUN echo "alias sf='php bin/console'" >> ~/.bashrc

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]