<?php

require_once __DIR__ . '/../../../repositories/donnees/AuteurRepository.php';
require_once __DIR__ . '/../../../repositories/donnees/LivreRepository.php';
require_once __DIR__ . '/../../../models/classes/Auteur.php';
require_once __DIR__ . '/../../../models/classes/Livre.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $auteurRepo = new AuteurRepository();
    $livreRepo  = new LivreRepository();

    // 1. Déterminer l'id de l'auteur : existant (rempli par l'AJAX) ou nouveau
    if (!empty($_POST['id_auteur'])) {
        $idAuteur = (int) $_POST['id_auteur'];
    } else {
        $nouvelAuteur = new Auteur(
            null,
            $_POST['nom_auteur'],
            $_POST['prenom_auteur'],
            $_POST['nationalite'] ?? null,
            $_POST['date_naissance'] ?? null
        );

        $idAuteur = $auteurRepo->CreateAuteur($nouvelAuteur); // doit retourner l'id inséré
    }

    // 2. Créer le livre avec cet id_auteur
    $livre = new Livre(
        null,
        $_POST['titre'],
        $_POST['genre'],
        $_POST['annee_publication'] ?: null,
        $idAuteur
    );

    $livreRepo->CreateLivre($livre);

    header('Location: ../livre.php');
    exit;
}