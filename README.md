# Fawaid Blog - فوائد

## Description

Fawaid Blog est une application web développée en PHP et MySQL permettant de publier et gérer des articles en langue arabe sur les bienfaits des aliments, plantes et produits naturels.

Le projet comprend une partie publique pour les visiteurs et une partie administration permettant de gérer le contenu du blog.

---

## Fonctionnalités

### Partie publique

- Affichage des articles
- Affichage des catégories
- Lecture des articles
- Pagination
- Design responsive

### Administration

- Authentification administrateur
- Tableau de bord
- Ajouter un article
- Modifier un article
- Supprimer un article
- Gestion des catégories
- Upload d'images
- Déconnexion

---

## Technologies utilisées

- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- Boxicons

---

## Structure du projet

```text
fawaid-blog/

├── admin/
│   ├── dashboard.php
│   ├── addPost.php
│   ├── editPost.php
│   ├── deletePost.php
│   ├── login.php
│   ├── logout.php
│   └── includes/
│       ├── navbar.php
│       ├── sidebar.php
│       └── stats.php
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── config/
│   └── db.php
│
├── index.php
└── README.md
```

---

## Installation

### 1. Cloner le projet

```bash
git clone https://github.com/mohamedamine6/fawaid-blog.git
```

### 2. Copier dans XAMPP

Placer le dossier dans :

```text
C:\xampp\htdocs\
```

### 3. Créer la base de données

Créer une base :

```sql
fawaid_blog
```

Importer le fichier SQL fourni.

### 4. Configurer la connexion

Modifier :

```php
config/db.php
```

```php
$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "fawaid_blog"
);
```

### 5. Lancer le projet

Ouvrir :

```text
http://localhost/fawaid-blog
```

---

## Auteur

Mohamed Amine Hachcham

Licence Développement Informatique

SUPMTI Rabat

2025-2026
