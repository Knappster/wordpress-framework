FROM wordpress

ARG UID
ARG GID

WORKDIR /var/www/html
VOLUME /var/www/html

# Change www-data user to match the host system UID and GID and chown www directory
RUN usermod --non-unique --uid ${UID} www-data \
  && groupmod --non-unique --gid ${GID} www-data \
  && chown -R www-data:www-data /var/www

EXPOSE 80 443

CMD ["apache2-foreground"]