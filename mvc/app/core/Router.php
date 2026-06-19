<?php

/**
 * Routeur : détermine le contrôleur et l'action à exécuter
 * à partir des paramètres de l'URL.
 *
 * Exemples :
 *   index.php                              -> ArticleController::index()
 *   index.php?action=show&id=1             -> ArticleController::show()
 *   index.php?controller=article&action=index&categorie=2
 */
class Router
{
    public function dispatch(): void
    {
        $controllerNom = $_GET['controller'] ?? 'article';
        $action        = $_GET['action'] ?? 'index';

        // Nom de classe attendu, ex : "article" -> "ArticleController"
        $classe = ucfirst(strtolower($controllerNom)) . 'Controller';

        if (!class_exists($classe)) {
            $this->erreur404("Contrôleur « $classe » introuvable.");
            return;
        }

        $controller = new $classe();

        if (!method_exists($controller, $action)) {
            $this->erreur404("Action « $action » introuvable.");
            return;
        }

        $controller->$action();
    }

    private function erreur404(string $message): void
    {
        http_response_code(404);
        echo '<h1>404 - Page introuvable</h1><p>' . htmlspecialchars($message) . '</p>';
    }
}
