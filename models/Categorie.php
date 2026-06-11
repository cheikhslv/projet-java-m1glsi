<?php

require_once __DIR__ . '/../config/database.php';

/**
 * Accès aux données des catégories.
 */
class Categorie
{
    /**
     * Retourne toutes les catégories (utilisées pour le menu de navigation).
     */
    public static function toutes(): array
    {
        $sql = 'SELECT id, libelle FROM Categorie ORDER BY id';
        return getConnexion()->query($sql)->fetchAll();
    }

    /**
     * Retourne une catégorie par son identifiant, ou null si introuvable.
     */
    public static function parId(int $id): ?array
    {
        $stmt = getConnexion()->prepare('SELECT id, libelle FROM Categorie WHERE id = :id');
        $stmt->execute([':id' => $id]);
        $categorie = $stmt->fetch();
        return $categorie ?: null;
    }
}
