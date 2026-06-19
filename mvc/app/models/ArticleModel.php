<?php

/**
 * Modèle des articles.
 */
class ArticleModel extends Model
{
    /**
     * Liste des articles, optionnellement filtrés par catégorie.
     *
     * @param int|null $categorieId Identifiant de catégorie, ou null pour tout afficher.
     */
    public function lister(?int $categorieId = null): array
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

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /**
     * Un article complet par son identifiant, ou null.
     */
    public function parId(int $id): ?array
    {
        $sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation, a.dateModification,
                       c.id AS categorie_id, c.libelle AS categorie_libelle
                FROM Article a
                LEFT JOIN Categorie c ON c.id = a.categorie
                WHERE a.id = :id';

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch() ?: null;
    }
}
