# 🪵 WoodyCraft

## (a) Présentation du besoin métier

L’entreprise **WoodyCraft** souhaite proposer une plateforme de **vente en ligne de puzzles 3D en bois**.  
Ces puzzles, à assembler soi-même, sont destinés à un public passionné par les objets artisanaux, la décoration et la mécanique en bois.

Le site a pour objectif de :
- Offrir une **expérience utilisateur simple et fluide** pour l’achat de puzzles 3D.
- Permettre aux utilisateurs de **créer un compte**, de **gérer leurs adresses** et de **commander en ligne**.
- Fournir une **interface d’administration** pour gérer les produits, catégories et commandes.
- Générer des **factures automatiques** et permettre un suivi des achats.
- Centraliser la **gestion des stocks** et des **catégories** de produits.

Le projet répond à un **besoin réel de digitalisation** d’une boutique artisanale, tout en respectant les bonnes pratiques du développement web moderne.

---

## (c) Modélisation UML

Le diagramme UML ci-dessous présente les principales classes et relations utilisées dans le projet :

📘 **Diagramme UML des entités :**

![Diagramme UML](./assets/uml_woodycraft.png)

### Description :
- `User` : représente un utilisateur inscrit sur le site (client ou administrateur).  
- `Adresse` : contient les coordonnées de livraison liées à un utilisateur.  
- `Puzzle` : représente un produit en bois disponible à la vente.  
- `Categorie` : regroupe plusieurs puzzles selon leur type (animal, véhicule, architecture, etc.).  
- `Panier` : permet de stocker les puzzles ajoutés avant la commande.  
- `Commande` : représente une transaction validée avec un utilisateur et une adresse.  

---

## (d) Maquette de l’application

La maquette a été conçue pour proposer une **navigation claire** et **esthétique**, adaptée aux besoins de l’utilisateur et de l’administrateur.

📱 **Aperçu des interfaces principales :**

| Page | Description | Capture |
|------|--------------|----------|
| Page d’accueil | Liste des puzzles 3D avec images, prix et bouton “Ajouter au panier” | ![Accueil](./assets/maquette_accueil.png) |
| Page produit | Détails d’un puzzle (photo, description, prix, bouton panier) | ![Produit](./assets/maquette_produit.png) |
| Panier | Récapitulatif des produits sélectionnés avant commande | ![Panier](./assets/maquette_panier.png) |
| Tableau de bord admin | Gestion des puzzles et catégories | ![Dashboard](./assets/maquette_admin.png) |

> Les maquettes ont été réalisées à l’aide de **Figma** (ou un autre outil de conception selon ton cas).

---

## (e) Modélisation de la base de données

La base de données est conçue selon le **modèle relationnel MySQL**.  
Elle garantit la cohérence des informations entre les utilisateurs, produits, commandes et adresses.

📊 **Schéma de la base de données :**

![Modèle BDD](./assets/bdd_woodycraft.png)

### Tables principales :
| Table | Description |
|--------|--------------|
| **users** | Contient les informations des utilisateurs (nom, email, mot de passe, rôle). |
| **adresses** | Gère les adresses de livraison et de facturation liées à chaque utilisateur. |
| **puzzles** | Liste les puzzles 3D disponibles à la vente (nom, description, prix, image, stock). |
| **categories** | Catégorise les puzzles par type. |
| **paniers** | Stocke les puzzles ajoutés par les utilisateurs avant validation. |
| **commandes** | Contient les informations relatives aux achats effectués. |
| **factures** *(optionnel)* | Permet de générer un document PDF pour chaque commande. |

### Relations principales :
- **Un utilisateur** possède plusieurs **adresses**.  
- **Une catégorie** regroupe plusieurs **puzzles**.  
- **Un puzzle** peut apparaître dans plusieurs **paniers** (relation Many-to-Many).  
- **Une commande** appartient à un **utilisateur** et à une **adresse**.

---

## Technologies utilisées
- **Backend :** PHP 8 / Laravel 10  
- **Frontend :** Blade, Tailwind CSS  
- **Base de données :** MySQL  
- **Serveur local :** Laragon  
- **Outils :** VS Code, GitHub, HeidiSQL, Figma

---

## Auteur
Projet réalisé par **Dalil Aitchaib**, étudiant en **BTS SIO SLAM**  
dans le cadre du projet de fin d’année 2025.

---

## Licence
Projet à but pédagogique – © 2025 WoodyCraft, tous droits réservés.
