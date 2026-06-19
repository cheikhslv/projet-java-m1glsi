<?php if (empty($article)): ?>
    <h2 class="section-titre">Article introuvable</h2>
    <p class="message-vide">L'article demandé n'existe pas.</p>
    <a class="lien-lire" href="index.php">← Retour à l'accueil</a>
<?php else: ?>
    <article class="article-detail">
        <?php if (!empty($article['categorie_libelle'])): ?>
            <a class="badge-categorie"
               href="index.php?categorie=<?= (int) $article['categorie_id'] ?>">
                <?= e($article['categorie_libelle']) ?>
            </a>
        <?php endif; ?>

        <h2><?= e($article['titre']) ?></h2>

        <p class="meta">
            Publié le <?= e(date('d/m/Y à H:i', strtotime($article['dateCreation']))) ?>
        </p>

        <div class="contenu-complet">
            <?= nl2br(e($article['contenu'])) ?>
        </div>

        <a class="lien-lire" href="index.php">← Retour aux actualités</a>
    </article>
<?php endif; ?>
