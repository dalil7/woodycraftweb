# WoodyCraft

## Présentation générale

**WoodyCraft** est un site e-commerce développé dans le cadre du **BTS SIO option SLAM**.  
Il permet la vente en ligne de **puzzles 3D en bois** à assembler soi-même.  
Ce projet illustre la mise en place complète d’une application web professionnelle, de la modélisation à la mise en production.

L’objectif principal est de **digitaliser une boutique artisanale** de puzzles en bois et de proposer une plateforme moderne, ergonomique et sécurisée.

---

## (a)  Présentation du besoin métier

L’entreprise **WoodyCraft** souhaite étendre sa visibilité en ligne et faciliter la vente de ses produits artisanaux.  
Avant ce projet, la vente ne se faisait qu’en boutique physique.  
Le besoin métier est donc de créer un site e-commerce complet permettant :

- Aux **clients** :
  - De consulter les puzzles disponibles (avec images, descriptions et prix)
  - De créer un **compte utilisateur**
  - D’ajouter des produits à un **panier**
  - De gérer leurs **adresses de livraison**
  - De passer **une commande** et recevoir une **facture**

- À l’**administrateur** :
  - De gérer le **catalogue de produits**
  - D’administrer les **catégories**
  - De consulter et suivre les **commandes clients**

Le site répond ainsi à un besoin de **gestion centralisée des ventes** tout en offrant une **expérience utilisateur fluide**.

---

## ⚙️ Objectifs techniques

- Développer une application complète avec le framework **Laravel**
- Concevoir une **base de données relationnelle** fiable et cohérente
- Mettre en place une **interface responsive et intuitive**
- Sécuriser l’accès via un système d’authentification Laravel
- Automatiser la **génération de factures** au format PDF
- Permettre une **administration simple** via un tableau de bord

---

## (c) Modélisation UML

Le diagramme UML décrit les entités principales et leurs relations dans l’application.

![Diagramme UML](./assets/uml_woodycraft.png)

### Explication des classes principales

| Classe | Rôle |
|--------|------|
| **User** | Représente un utilisateur (client ou administrateur) |
| **Adresse** | Stocke les adresses de livraison ou de facturation |
| **Puzzle** | Produit vendu sur le site |
| **Categorie** | Catégorise les puzzles (ex : animaux, véhicules, monuments…) |
| **Panier** | Contient les puzzles sélectionnés par un utilisateur |
| **Commande** | Regroupe les informations d’un achat validé |

Les relations principales sont :
- Un **utilisateur** possède plusieurs **adresses**  
- Une **catégorie** contient plusieurs **puzzles**  
- Un **puzzle** peut appartenir à plusieurs **paniers**  
- Une **commande** appartient à un **utilisateur** et à une **adresse**

---

## (d)  Maquettes de l’application

Les maquettes ont été conçues pour assurer une **navigation claire et cohérente** entre les différentes pages du site.

| Page | Description | 
|------|--------------|----------------|
| **Accueil** | Présente les puzzles 3D disponibles, avec image, prix et bouton d’ajout au panier |
| **Page produit** | Détails du puzzle sélectionné (photo, description, prix) |
| **Panier** | Liste des produits ajoutés, avec possibilité de modification et suppression | 
| **Commande / Facture** | Récapitulatif de la commande validée et génération de facture PDF |
| **Tableau de bord admin** | Gestion des produits, catégories et utilisateurs |
> Les maquettes ont été réalisées avec **Figma**, dans un style minimaliste et ergonomique.

---

## (e) 🗄️ Modélisation de la base de données

![Modèle BDD](./assets/bdd_woodycraft.png)

### Structure et relations

| Table | Description |
|--------|-------------|
| **users** | Informations des utilisateurs (nom, email, mot de passe, rôle) |
| **adresses** | Adresses associées aux utilisateurs |
| **puzzles** | Produits disponibles à la vente |
| **categories** | Regroupe les puzzles par thème |
| **paniers** | Panier de chaque utilisateur |
| **commandes** | Regroupe les informations d’un achat |
| **factures** | Génération automatique après validation d’une commande |

Les **relations** entre les tables respectent les bonnes pratiques de la **3e forme normale (3NF)**, garantissant la cohérence des données.

---

## Technologies utilisées

| Domaine | Technologies |
|----------|--------------|
| **Backend** | PHP 8 / Laravel 10 |
| **Frontend** | Blade, Tailwind CSS |
| **Base de données** | MySQL |
| **Serveur local** | Laragon 6.0 |
| **Outils** | VS Code, GitHub, HeidiSQL, Figma |

### Environnement de développement
- **Apache** : 2.4.54  
- **PHP** : 8.1.10  
- **MySQL** : 8.0.30  
- **Ports utilisés** : HTTP 80 / MySQL 3306  

![Laragon](./assets/laragon.png)

---

## Installation du projet

### Prérequis
- PHP ≥ 8.0  
- Composer  
- MySQL  
- Laragon (ou XAMPP, WAMP…)

### Étapes
```bash
# 1. Cloner le dépôt
git clone https://github.com/ton-utilisateur/woodycraft.git
cd woodycraft

# 2. Installer les dépendances Laravel
composer install

# 3. Créer le fichier d’environnement
cp .env.example .env

# 4. Générer la clé d’application
php artisan key:generate

# 5. Configurer la base de données dans le fichier .env

# 6. Lancer les migrations et les seeders
php artisan migrate --seed

# 7. Démarrer le serveur Laravel
php artisan serve
