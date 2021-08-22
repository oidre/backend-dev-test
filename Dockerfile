FROM composer AS composer

FROM php:7.3.29-fpm-alpine

# Install nginx supervisor and mongdb sqlsrv dependencies
RUN apk --no-cache add nginx supervisor curl zlib-dev unixodbc-dev

# Install mongodb sqlsrv redis driver
RUN apk --no-cache add \
    $PHPIZE_DEPS \
    && pecl install mongodb sqlsrv redis \
    && docker-php-ext-enable mongodb sqlsrv redis

# Configure nginx
COPY docker/nginx.conf /etc/nginx/nginx.conf

# Configure supervisord
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Setup document root
RUN mkdir -p /var/www/html

# Make sure files/folders needed by the processes are accessable when they run under the nobody user
RUN chown -R nobody.nobody /var/www/html && \
  chown -R nobody.nobody /run && \
  chown -R nobody.nobody /var/lib/nginx && \
  chown -R nobody.nobody /var/log/nginx

# Switch to use a non-root user from here on
USER nobody

# Add application
WORKDIR /var/www/html
COPY --chown=nobody . /var/www/html/
#COPY --chown=nginx --from=composer /app /var/www/html

# Install composer from the official image
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Run composer install to install the dependencies
RUN composer install --optimize-autoloader --no-interaction --no-progress

# Expose the port nginx is reachable on
EXPOSE 8080

# Let supervisord start nginx & php-fpm
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

# Configure a healthcheck to validate that everything is up&running
HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:8080/fpm-ping
