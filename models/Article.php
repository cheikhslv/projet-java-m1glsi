<?php

require_once __DIR__ . '/../config/database.php';

/**
 * Accès aux données des articles.
 */
class Article
{
    /**
     * Retourne les articles, optionnellement filtrés par catégorie.
     * Le libellé de la catégorie est joint pour l'affichage.
     *
     * @param int|null $categorieId Identifiant de catégorie, ou null pour tout afficher.
     */
    public static function lister(?int $categorieId = null): array
    {
        $sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation, c.libelle AS categorie_libelle
                FROM Article a
                LEFT JOIN Categorie c ON c.id = a.categorie';

        $params = [];
        if ($categorieId !== null) {
            $sql .= ' WHERE a.categorie = :categorie';
            $params[':categorie'] = $categorieId;
        }

        $sql .= ' ORDER BY a.dateCreation DESC, a.id DESC';

        $stmt = getConnexion()->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Retourne un article par son identifiant, ou null si introuvable.
     */
    public static function parId(int $id): ?array
    {
        $sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation, a.dateModification,
                       c.id AS categorie_id, c.libelle AS categorie_libelle
                FROM Article a
                LEFT JOIN Categorie c ON c.id = a.categorie
                WHERE a.id = :id';

        $stmt = getConnexion()->prepare($sql);
        $stmt->execute([':id' => $id]);
        $article = $stmt->fetch();
        return $article ?: null;
    }
}
