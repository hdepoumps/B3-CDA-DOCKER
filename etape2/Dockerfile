# Étape 1 : Construire l'image MySQL
FROM mysql:5.7 as mysql_builder
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABASE=gestion_produits
COPY ./database/gestion_produits.sql /docker-entrypoint-initdb.d/

# Étape 2 : Construire l'image PHP
FROM php:5.6-apache
COPY ./www/ /var/www/html/
RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN chmod -R 777 /var/www/html/uploads
COPY --from=mysql_builder /var/lib/mysql /var/lib/mysql
EXPOSE 80

