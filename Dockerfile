FROM php:8.3-apache
RUN docker-php-ext-install pdo_pgsql opcache
RUN a2enmod rewrite headers expires
WORKDIR /var/www/html
COPY . /var/www/html
RUN chown -R www-data:www-data storage uploads && chmod -R 775 storage uploads
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf /etc/apache2/apache2.conf
EXPOSE 80
CMD ["apache2-foreground"]
