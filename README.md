WoodyCraft
Présentation du projet

WoodyCraft est un site e-commerce développé dans le cadre du BTS SIO option SLAM.
Il permet la vente en ligne de puzzles 3D en bois, avec une interface simple, claire et intuitive.
L’objectif du projet est de proposer une solution complète de gestion d’un site marchand : de la consultation des produits à la gestion du panier et des commandes.

Objectifs du projet

Concevoir une application web fonctionnelle et sécurisée avec le framework Laravel.

Permettre aux utilisateurs de parcourir, rechercher et acheter des puzzles 3D.

Gérer le cycle complet d’un achat (connexion, panier, adresse, paiement, facture).

Offrir une interface d’administration pour la gestion des produits et des catégories.

Fonctionnalités principales
Côté utilisateur

Inscription et authentification

Consultation des produits par catégorie

Ajout, modification et suppression d’articles dans le panier

Gestion des adresses de livraison

Validation de commande et génération de facture

Côté administrateur

Gestion des produits (ajout, édition, suppression)

Gestion des catégories

Consultation des commandes et des utilisateurs

Architecture technique

Langage principal : PHP 8 / Laravel 10

Base de données : MySQL

Front-end : Blade / Tailwind CSS

Serveur local : Laragon

Outils utilisés : VS Code, GitHub, Laravel Artisan, HeidiSQL

Environnement de développement

Le projet a été développé et testé sous Laragon 6.0 avec la configuration suivante :

Apache : httpd-2.4.54-win64-VS16

PHP : 8.1.10

MySQL : 8.0.30

Ports utilisés :

HTTP : 80

MySQL : 3306

Exemple d’écran Laragon :


Modèle de données

Le projet repose sur plusieurs tables principales :

users : informations des utilisateurs

adresses : adresses de livraison

puzzles : produits disponibles à la vente

categories : classification des puzzles

paniers : gestion du panier utilisateur

commandes : gestion des achats et factures

Les relations entre ces entités ont été modélisées à l’aide d’un diagramme UML.

Installation du projet
Prérequis

PHP ≥ 8.0

Composer

MySQL

Laragon ou tout autre serveur local compatible

Étapes d’installation

Cloner le dépôt :
