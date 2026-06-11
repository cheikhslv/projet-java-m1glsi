<?php
require_once __DIR__ . '/models/Article.php';
require_once __DIR__ . '/includes/header.php';

// $categorieActive est défini dans header.php
$articles = Article::lister($categorieActive);

// Titre de la section : générique ou nom de la catégorie filtrée
$titreSection = 'Les dernières actualités';
if ($categorieActive !== null) {
    $categorie = Categorie::parId($categorieActive);
    if ($categorie) {
        $titreSection = 'Actualités : ' . $categorie['libelle'];
    }
}
?>

<h2 class="section-titre"><?= e($titreSection) ?></h2>

<?php if (empty($articles)): ?>
    <p class="message-vide">Aucun article disponible pour le moment.</p>
<?php else: ?>
    <?php foreach ($articles as $article): ?>
        <article class="carte-article">
            <h3>
                <a href="article.php?id=<?= (int) $article['id'] ?>">
                    <?= e($article['titre']) ?>
                </a>
            </h3>
            <p class="contenu"><?= e(extrait($article['contenu'])) ?></p>
            <a class="lien-lire" href="article.php?id=<?= (int) $article['id'] ?>">Lire la suite →</a>
        </article>
    <?php endforeach; ?>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
