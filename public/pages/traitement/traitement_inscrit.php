<?php
session_start();
require_once __DIR__. '/../../../models/classes/Inscrit.php';
require_once __DIR__ . '/../../../repositories/donnees/InscritRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $email = trim($_POST['email']);
    $telephone = trim($_POST['telephone']);

    $user = new Inscrit(null,$nom,$prenom,$email,$telephone);
  $userRepo = new InscritRepository();
   $userRepo -> CreationInscrit($user);
    
    $_SESSION['message'] = 'Inscrit ajouté avec succès !';
    $_SESSION['message_type'] = 'success';

    header('location: ../inscrit.php');
    exit();
}