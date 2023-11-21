

## Pré-requis

  - PHP version: v8 and <
  - MySQL version: 5.7.39
  - composer version: 2.5.8
  - laravel version: 10
  - Angular version: 16

## Installation
   - Backend Laravel :

        - Cloner le projet 
        - cd /api
        - composer install
        - php artisan migrate
        - php artisan serve

    - Frontend angular

        - cd /frontend
        - npm install
        - ng serve

## Fonctionnalités

    - CLI

        - Créer catégorie
        - Supprimer catégorie
        - Creer produit
        - Supprimer produit

    - WEB
        
        - Créer produit
        - Modifier produit
        - Supprimer produit
        - Afficher les produits
        - Filtrer les produits en fonction des catégories

## Créer à partir du Cli

    - Créer catégorie :  php artisan category:create [name]
    - Supprimer catégorie : php artisan category:delete [name]

    - Créer produit : php artisan product:create [name] [price] [url] [desc]
    - Supprimer produit : php artisan product:delete [name]

