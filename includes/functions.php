<?php

/**
 * Échappe une chaîne pour un affichage HTML sécurisé (anti-XSS).
 */
function e(?string $valeur): string
{
    return htmlspecialchars((string) $valeur, ENT_QUOTES, 'UTF-8');
}

/**
 * Tronque un texte à une longueur donnée et ajoute des points de suspension.
 */
function extrait(string $texte, int $longueur = 200): string
{
    $texte = trim($texte);
    if (mb_strlen($texte) <= $longueur) {
        return $texte;
    }
    return mb_substr($texte, 0, $longueur) . '…';
}
