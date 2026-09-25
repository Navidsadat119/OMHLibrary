FROM php:8.3-apache

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpq-dev \
    && docker-php-ext-install pdo_pgsql opcache \
    && a2enmod rewrite headers expires \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY . /var/www/html

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
    /etc/apache2/apache2.conf \
    && mkdir -p \
        /var/www/html/storage \
        /var/www/html/uploads \
        /var/www/html/uploads/covers \
        /var/www/html/uploads/pdfs \
        /var/www/html/uploads/submissions \
        /var/www/html/uploads/submission-covers \
    && chown -R www-data:www-data \
        /var/www/html/storage \
        /var/www/html/uploads \
    && chmod -R 775 \
        /var/www/html/storage \
        /var/www/html/uploads

EXPOSE 80

CMD ["bash", "-lc", "php database/migrate.php && php database/seed.php && apache2-foreground"]
