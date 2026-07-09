<?php 
require __DIR__ . '/../../../models/classes/Livre.php';
require __DIR__ . '/../../../repositories/donnees/LivreRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['titre']);
    $genre=trim($_POST['genre']);
    $date_publication = trim($_POST['annee_publication']);
    $idAuteur=1;

    $livre = new Livre(null,$title,$genre,$date_publication,$idAuteur);
    $repo = new LivreRepository();
    $repo ->CreateLivre($livre);
    
     header('Location: ./../livre.php');
    die();
}

