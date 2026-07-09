<?php
require_once  __DIR__. '/../../../models/classes/Auteur.php';
require_once __DIR__ . '/../../../repositories/donnees/AuteurRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom=trim( $_POST['nom']);
    $prenom= trim( $_POST['prenom']);
    $nationalite = trim($_POST['nationalite']);
    $dateNaissance = trim($_POST['date_naissance']);


    if (!empty($nom) && !empty($prenom) && !empty($nationalite) && !empty($dateNaissance)) {
    
    $auteur = new Auteur(null,$nom,$prenom,$nationalite,$dateNaissance);

    $repo = new AuteurRepository();
    $repo ->CreateAuteur($auteur);
    $listeAuteurs = $repo->afficherAuteurs();

    header('location: ./../auteur.php');
    die();
    }
/*
foreach ($listeAuteurs as $auteur) {
    var_dump($auteur->getNomComplet()) ;

}
die();
     }else{

     } */
}
