FROM php:7.0-cli


WORKDIR /app

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev \
        zip \
        unzip \
        git \
        git-core

RUN docker-php-ext-install zip

# Composer
ENV COMPOSER_HOME /var/www/.composer

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin \
    --filename=composer

RUN chown -R www-data:www-data /var/www/

RUN mkdir -p $COMPOSER_HOME/cache

VOLUME $COMPOSER_HOME

CMD ["/usr/local/bin/php", "/app/bin/divante.php"]