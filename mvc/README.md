# Actualités Polytechniciennes — Version MVC

Même application que la version simple, mais organisée selon le patron
**MVC (Modèle - Vue - Contrôleur)** avec un **front controller** et un **routeur**.

## Architecture

```
mvc/
├── index.php                       # Front controller (point d'entrée unique)
├── config/
│   └── database.php                # Paramètres de connexion
├── app/
│   ├── helpers.php                 # Fonctions utilitaires (e(), extrait())
│   ├── core/
│   │   ├── Database.php            # Connexion PDO (Singleton)
│   │   ├── Model.php               # Modèle de base
│   │   ├── Controller.php          # Contrôleur de base (rendu des vues)
│   │   └── Router.php              # Routeur (URL -> contrôleur/action)
│   ├── controllers/
│   │   └── ArticleController.php   # index() et show()
│   ├── models/
│   │   ├── ArticleModel.php
│   │   └── CategorieModel.php
│   └── views/
│       ├── layouts/
│       │   ├── header.php          # En-tête + menu
│       │   └── footer.php
│       └── articles/
│           ├── index.php           # Liste des articles
│           └── show.php            # Détail d'un article
└── public/
    └── css/
        └── style.css
```

## Comment ça marche (le flux MVC)

1. Toutes les URL passent par **`index.php`** (front controller).
2. Le **`Router`** lit `?controller=` et `?action=` puis appelle la bonne méthode.
3. Le **contrôleur** (`ArticleController`) demande les données aux **modèles**.
4. Les **modèles** (`ArticleModel`, `CategorieModel`) interrogent la base via PDO.
5. Le contrôleur transmet les données à une **vue**, enveloppée par le layout.

### Routes disponibles

| URL                                         | Action                              |
|---------------------------------------------|-------------------------------------|
| `index.php`                                 | Liste de tous les articles          |
| `index.php?categorie=1`                     | Articles d'une catégorie            |
| `index.php?action=show&id=1`                | Détail d'un article                 |

## Installation (XAMPP)

1. Copie le dossier `mvc` dans `C:\xampp\htdocs\` et renomme-le `actu-app`
   (ou copie son **contenu** dans `C:\xampp\htdocs\actu-app`).
2. Importe `mglsi_news.sql` dans phpMyAdmin (http://localhost/phpmyadmin).
3. Démarre **Apache** et **MySQL** dans XAMPP.
4. Ouvre **http://localhost/actu-app/**

> Si tu utilises le compte par défaut de XAMPP, mets dans `config/database.php` :
> `'user' => 'root'` et `'pass' => ''`.
