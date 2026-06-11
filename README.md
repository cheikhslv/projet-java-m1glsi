# Actualités Polytechniciennes — Version PHP

Application web de gestion d'actualités développée en **PHP (PDO) + MySQL**, reproduisant
la maquette du projet (en-tête, menu par catégories, liste des derniers articles, page de détail).

## Structure du projet

```
.
├── config/
│   └── database.php        # Connexion PDO à MySQL
├── models/
│   ├── Article.php         # Requêtes sur les articles
│   └── Categorie.php       # Requêtes sur les catégories
├── includes/
│   ├── functions.php       # Fonctions utilitaires (échappement, extrait)
│   ├── header.php          # En-tête + menu de navigation
│   └── footer.php          # Pied de page
├── assets/
│   └── css/
│       └── style.css       # Feuille de style
├── index.php               # Accueil : liste des articles (filtrable par catégorie)
├── article.php             # Détail d'un article
└── mglsi_news.sql          # Script de création de la base
```

## Installation (XAMPP / WAMP / Laragon)

1. **Copier le projet** dans le dossier web du serveur, dans un dossier `actu-app` :
   - XAMPP : `C:\xampp\htdocs\actu-app`
   - WAMP : `C:\wamp64\www\actu-app`

2. **Créer la base de données.** Ouvrir phpMyAdmin (ou la console MySQL) et importer
   le fichier `mglsi_news.sql`. Il crée la base `mglsi_news`, les tables `Article` et
   `Categorie`, insère des données d'exemple et crée l'utilisateur `mglsi_user`.

   En ligne de commande :
   ```bash
   mysql -u root -p < mglsi_news.sql
   ```

3. **Démarrer Apache + MySQL**, puis ouvrir dans le navigateur :
   ```
   http://localhost/actu-app/
   ```

## Identifiants de connexion à la base

Définis dans `config/database.php` (et créés par `mglsi_news.sql`) :

| Paramètre | Valeur        |
|-----------|---------------|
| Hôte      | `localhost`   |
| Base      | `mglsi_news`  |
| Utilisateur | `mglsi_user` |
| Mot de passe | `passer`   |

> Pour utiliser le compte `root` à la place, modifie simplement les constantes
> `DB_USER` / `DB_PASS` dans `config/database.php`.

## Fonctionnalités

- **Accueil** : affiche les derniers articles (titre + extrait du contenu).
- **Menu de navigation** : généré dynamiquement à partir des catégories en base
  (Accueil, Sport, Santé, Education, Politique). Clic = filtrage des articles.
- **Page de détail** : contenu complet de l'article, catégorie et date de publication.
- **Sécurité** : requêtes préparées (anti-injection SQL) et échappement HTML (anti-XSS).
