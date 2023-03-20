FROM php:8.2.1-fpm-alpine3.17

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# MacOS staff group's gid is 20, so is the dialout group in alpine linux. We're not using it, let's just remove it.
RUN delgroup dialout

RUN addgroup -g ${GID} --system perfilov_test
RUN adduser -G perfilov_test --system -D -s /bin/sh -u ${UID} perfilov_test

RUN sed -i "s/user = www-data/user = perfilov_test/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = perfilov_test/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

USER perfilov_test

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
