<?php

/**
 * Contrôleur de base : charge les modèles et affiche les vues.
 */
abstract class Controller
{
    /**
     * Instancie un modèle par son nom de classe.
     */
    protected function model(string $nom): Model
    {
        return new $nom();
    }

    /**
     * Affiche une vue en lui passant des données.
     * Les vues sont enveloppées par le layout (header + footer).
     *
     * @param string $vue    Chemin de la vue, ex : 'articles/index'
     * @param array  $donnees Variables disponibles dans la vue
     */
    protected function view(string $vue, array $donnees = []): void
    {
        extract($donnees);

        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/' . $vue . '.php';
        require __DIR__ . '/../views/layouts/footer.php';
    }
}
