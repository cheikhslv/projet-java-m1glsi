<?php

/**
 * Contrôleur des articles.
 */
class ArticleController extends Controller
{
    /**
     * Page d'accueil : liste des articles (filtrable par catégorie via ?categorie=).
     */
    public function index(): void
    {
        $articleModel   = $this->model('ArticleModel');
        $categorieModel = $this->model('CategorieModel');

        $categorieActive = isset($_GET['categorie']) ? (int) $_GET['categorie'] : null;
        $articles        = $articleModel->lister($categorieActive);
        $categories      = $categorieModel->toutes();

        $titreSection = 'Les dernières actualités';
        if ($categorieActive !== null) {
            $categorie = $categorieModel->parId($categorieActive);
            if ($categorie) {
                $titreSection = 'Actualités : ' . $categorie['libelle'];
            }
        }

        $this->view('articles/index', [
            'articles'        => $articles,
            'categories'      => $categories,
            'categorieActive' => $categorieActive,
            'titreSection'    => $titreSection,
        ]);
    }

    /**
     * Détail d'un article (via ?action=show&id=).
     */
    public function show(): void
    {
        $articleModel   = $this->model('ArticleModel');
        $categorieModel = $this->model('CategorieModel');

        $id      = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $article = $id > 0 ? $articleModel->parId($id) : null;

        $this->view('articles/show', [
            'article'         => $article,
            'categories'      => $categorieModel->toutes(),
            'categorieActive' => null,
        ]);
    }
}
