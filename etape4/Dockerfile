# Étape 1 : Construire l'image PostgreSQL
FROM postgres:13 as postgres_builder
ENV POSTGRES_PASSWORD=root
ENV POSTGRES_DB=gestion_produits
COPY ./database/gestion_produits.sql /docker-entrypoint-initdb.d/

# Étape 2 : Construire l'image PHP
FROM php:8.3-apache
# Installer les outils de développement de PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev
# Installer les extensions PHP pour PostgreSQL
RUN docker-php-ext-install pgsql pdo pdo_pgsql
COPY ./www/ /var/www/html/
RUN chmod -R 777 /var/www/html/uploads
COPY --from=postgres_builder /var/lib/postgresql/data /var/lib/postgresql/data
EXPOSE 80
