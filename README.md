# LittleNuts

## Liens utiles

- [Consignes du projet](https://github.com/becodeorg/LIE-Hamilton-1.7/tree/master/02-La-colline/02a-VueJS-Laravel)


## Pour coachs becode

- La branche à déployer est SPA_commun

- Toutes nos tentatives de déploiement Heroku/db4free se sont lamentablement terminées par une erreur 500. Quelque chose en rapport avec Laravel Dusk. En dernier recours, nous avons tenté l'add-on Heroku JawsDB mysql, mais sans avoir le temps de tout paraméter.

- Quelques features plus ou moins cruciales ne sont pas finalisées dans la version SPA mais étaient plus avancées ou fonctionnelles dans la version précédente. Cela est dû au fait que nous sommes passés d'une archi MPA à SPA en cours de route. La fonction Search envoie les requêtes au serveur correctement et reçoit les bonnes données en retour; il manque le component pour traduire et afficher les réponses sur le site. La possibilité pour l'utilisateur d'ajouter un film existe dans le MPA mais n'a pas pu être importée à tant dans le SPA. Le système multi-user n'est pas finalisé, et pour l'instant n'importe quel utilisateur peut passer d'un compte Guest à un compte Premium dans la section settings/account.

- Nous avons conservé le projet MPA en l'état dans les branches git dénommées dev_prénom et dev_commun.


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
git checkout SPA_prénom
git merge SPA_commun
git push origin SPA_prénom
```
- Be awesome
