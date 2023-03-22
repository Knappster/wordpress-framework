FROM wordpress:php8.2-apache

ARG UID
ARG GID

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./docker/wordpress/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY ./docker/wordpress/error_reporting.ini /usr/local/etc/php/conf.d/error_reporting.ini
COPY ./docker/wordpress/uploads.ini /usr/local/etc/php/conf.d/uploads.ini

WORKDIR /var/www/html
VOLUME /var/www/html

# Change www-data user to match the host system UID and GID and chown www directory
RUN usermod --non-unique --uid ${UID} www-data \
  && groupmod --non-unique --gid ${GID} www-data \
  && chown -R www-data:www-data /var/www

EXPOSE 80 443 9003

CMD ["apache2-foreground"]