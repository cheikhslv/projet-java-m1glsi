<h2 class="section-titre"><?= e($titreSection) ?></h2>

<?php if (empty($articles)): ?>
    <p class="message-vide">Aucun article disponible pour le moment.</p>
<?php else: ?>
    <?php foreach ($articles as $article): ?>
        <article class="carte-article">
            <h3>
                <a href="index.php?action=show&id=<?= (int) $article['id'] ?>">
                    <?= e($article['titre']) ?>
                </a>
            </h3>
            <p class="contenu"><?= e(extrait($article['contenu'])) ?></p>
            <a class="lien-lire" href="index.php?action=show&id=<?= (int) $article['id'] ?>">Lire la suite →</a>
        </article>
    <?php endforeach; ?>
<?php endif; ?>
