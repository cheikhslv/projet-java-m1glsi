<?php

/**
 * Modèle de base : fournit l'accès à la base de données à tous les modèles.
 */
abstract class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
}
