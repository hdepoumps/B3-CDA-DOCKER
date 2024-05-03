# Projet Docker : B3 CDA – DOCKER 
# Hugo DEPOUMPS
Ce projet illustre comment construire et lancer un conteneur Docker qui intègre une base de données MySQL et une application PHP.

## Prérequis

- Docker installé sur votre machine.
- Un projet PHP avec une base de données MySQL.

## 1 Conteneurisation de l’application

1. Ouvrez un terminal et naviguez jusqu'au répertoire contenant le Dockerfile.
2. Exécutez la commande suivante pour construire l'image Docker :
```
docker build -t hugo_application .
```

3. Une fois l'image construite, lancez un conteneur basé sur cette image en utilisant la commande suivante :

```
docker run -d -p 8080:80 --name mon_conteneur hugo_application
```

Maintenant que votre conteneur est en cours d'exécution, vous pouvez accéder à votre application en ouvrant un navigateur web et en naviguant vers `http://localhost:8080`.
