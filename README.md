# Projet Docker : B3 CDA – DOCKER 
# Hugo DEPOUMPS
Ce projet illustre comment construire et lancer un conteneur Docker qui intègre une base de données MySQL et une application PHP.

## Prérequis

- Docker installé sur votre machine.
- Un projet PHP avec une base de données MySQL.

## 1 Conteneurisation de l’application

1. Ouvrez un terminal et naviguez jusqu'au répertoire contenant le Dockerfile.
2. Exécutez la commande suivante pour construire l'image Docker :
```bash
docker build -t mysql_builder -f Dockerfile --target mysql_builder .
docker build -t php_web_app .
```
3. Maintenant ouvrez un réseau 
```bash
docker network create my_network
```
4. Une fois l'image construite et le réseau ouvert, lancez un conteneur basé sur cette image en utilisant la commande suivante :

```bash
docker run -d --name dbetape1 --network my_network -e MYSQL_DATABASE=gestion_produits -e MYSQL_ROOT_PASSWORD=root -v "$(Get-Location)/database:/docker-entrypoint-initdb.d" mysql_builder
docker run -d --name webetape1 --network my_network -p 8080:80 -v "$(Get-Location)/www:/var/www/html" php_web_app
```

Maintenant que votre conteneur est en cours d'exécution, vous pouvez accéder à l'application en ouvrant un navigateur web et en naviguant vers `http://localhost:8080`.

## 2 Mise en place de Docker Compose

1. Ouvrez un terminal et naviguez jusqu'au répertoire "etape2".
2. Exécutez la commande suivante pour construire l'image Docker :
```bash
docker-compose up -d
```
Maintenant que votre conteneur est en cours d'exécution, vous pouvez accéder à l'application en ouvrant un navigateur web et en naviguant vers `http://localhost:8080`.

## 3 Version de dev : mise à jour de la plate-forme
1. Ouvrez un terminal et naviguez jusqu'au répertoire "etape3".
2. Exécutez la commande suivante pour construire l'image Docker :
```bash
docker-compose up -d
```
Maintenant que votre conteneur est en cours d'exécution, vous pouvez accéder à l'application en ouvrant un navigateur web et en naviguant vers `http://localhost:8080`.
La connexion à la base de données peut prendre quelque secondes

## 3 Version de dev : mise à jour de la plate-forme
1. Ouvrez un terminal et naviguez jusqu'au répertoire "etape4".
2. Exécutez la commande suivante pour construire l'image Docker :
```bash
docker-compose up -d
```
Maintenant que votre conteneur est en cours d'exécution, vous pouvez accéder à l'application en ouvrant un navigateur web et en naviguant vers `http://localhost:8080`.

