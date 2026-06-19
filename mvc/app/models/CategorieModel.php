<?php

/**
 * Modèle des catégories.
 */
class CategorieModel extends Model
{
    /**
     * Toutes les catégories (pour le menu de navigation).
     */
    public function toutes(): array
    {
        return $this->db->query('SELECT id, libelle FROM Categorie ORDER BY id')->fetchAll();
    }

    /**
     * Une catégorie par son identifiant, ou null.
     */
    public function parId(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT id, libelle FROM Categorie WHERE id = :id');
        $stmt->execute([':id' => $id]);
        return $stmt->fetch() ?: null;
    }
}
