# LittleNuts

## Liens utiles

- [Consignes du projet](https://github.com/becodeorg/LIE-Hamilton-1.7/tree/master/02-La-colline/02a-VueJS-Laravel)


## Laravel-Vue SPA

- Voir https://github.com/cretueusebiu/laravel-vue-spa pour info. On a déjà installé cet environnement en clean dans SPA_commun.
Petit à petit, avec Jolan on va implémenter les fonctions de bases nécessaires à LittleNuts pour qu'on puisse tous se mettre à bosser sur les Vue Components de manière safe et clean.

### Marche à suivre

- Puller la branche SPA_commun
```
git pull origin SPA_commun
```
- Après le pull, s'assurer que le fichier .env est bien paramétré
```
APP_NAME=LittleNuts
```
```
DB_CONNECTION=mysql
DB_HOST=172.19.0.1
DB_PORT=3306
DB_DATABASE=dev
DB_USERNAME=dev
DB_PASSWORD=dev
```
- Reseter votre base de données
```
php artisan migrate:reset
```
- Si ça ne marche pas, le faire manuellement dans phpMyAdmin

- Migrer la base de données
```
php artisan migrate
```
- Et puis, comme d'hab niveau serveurs
```
docker-compose up
php artisan serve
npm run watch
```
- Si tout marche bien, créer sa branche
```
git branch SPA_prénom
git merge SPA_commun
git push origin SPA_prénom
```
- Be awesome
