<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités Polytechniciennes</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header class="site-header">
        <h1>ACTUALITÉS POLYTECHNICIENNES</h1>
    </header>

    <nav class="site-nav">
        <ul>
            <li>
                <a href="index.php" class="<?= ($categorieActive ?? null) === null ? 'active' : '' ?>">Accueil</a>
            </li>
            <?php foreach (($categories ?? []) as $categorie): ?>
                <li>
                    <a href="index.php?categorie=<?= (int) $categorie['id'] ?>"
                       class="<?= ($categorieActive ?? null) === (int) $categorie['id'] ? 'active' : '' ?>">
                        <?= e($categorie['libelle']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <main class="container">
