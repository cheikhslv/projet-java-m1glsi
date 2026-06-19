<?php
/**
 * Front controller : point d'entrée unique de l'application MVC.
 * Toutes les requêtes passent par ce fichier.
 */

require_once __DIR__ . '/app/core/Database.php';
require_once __DIR__ . '/app/helpers.php';

// Chargement automatique des classes (core, controllers, models).
spl_autoload_register(function (string $classe): void {
    $dossiers = [
        __DIR__ . '/app/core/',
        __DIR__ . '/app/controllers/',
        __DIR__ . '/app/models/',
    ];
    foreach ($dossiers as $dossier) {
        $fichier = $dossier . $classe . '.php';
        if (file_exists($fichier)) {
            require_once $fichier;
            return;
        }
    }
});

// Démarrage du routeur.
(new Router())->dispatch();
