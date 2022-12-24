#  GUIDE D'INSTALLATION COSMED


ce package permet aux visiteurs du site de prendre contact avec les services
internes de Cosmed

## INSTALLATION

Vous pouvez installer le package via composer :

```bash
composer require aitbella/cosmed

php artisan breeze:install

php artisan migrate     //générer des tables de base de données

php artisan db:seed      //Ajouter tout les pays et la list des Destinataire

```

## Publication des fichiers /  override le fichier de menu Breeze
```bash
php artisan vendor:publish --tag=cosmed-breeze --force

```
## Publication des fichiers Lang fr

```bash
php artisan vendor:publish --tag=cosmed-lang

```
#### Changer la langue locale en français  dans config/app.php 

```php
    'locale' => 'fr',
```

## Utilisation
#### nom du l'application dans .env file

```php
    APP_NAME=cosmed 
```


### ajouter les paramètres des mailings et l'email par défaut pour l'envoi
```php
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### créer un utilisateur administrateur à partir de notre commande CLI personnalisée
```bash
php artisan cosmed:admin
"Entrez l'adresse e-mail de l'administrateur:"
 > demo@demo.com
 "Entrez le nom de l'administrateur:"
 > admin
 "Entrez le mot de passe administrateur:"
 >
 "Confirmez le mot de passe:"
 >

```

### pour ce connecté visité le lien  /login



### l'e-mail a été testé avec mailtrap.io :white_check_mark:
### package  a été testé avec laravel 9 :white_check_mark:


###  les Packages extern utilisés sont
- [Laravel-Excel](https://github.com/SpartnerNL/Laravel-Excel)

# questions  ?
1.3 Définition des données  ==> Qu'est-ce qu'un champ Administrable ?


## OBTENEZ LE PACKAGE DU SITE  de packagist.org

[packagist](https://packagist.org/packages/aitbella/cosmed)

# :thumbsup:  Cordialement
