<?php
/**
 * Connexion à la base de données via PDO.
 * Les identifiants correspondent à ceux créés dans mglsi_news.sql.
 */

const DB_HOST = 'localhost';
const DB_NAME = 'mglsi_news';
const DB_USER = 'mglsi_user';
const DB_PASS = 'passer';
const DB_CHARSET = 'utf8mb4';

function getConnexion(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            http_response_code(500);
            exit('Erreur de connexion à la base de données : ' . $e->getMessage());
        }
    }

    return $pdo;
}
