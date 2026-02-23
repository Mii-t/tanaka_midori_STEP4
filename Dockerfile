FROM php:8.2-apache
COPY src/ /var/www/html/
CMD ["apache2-foreground"]
