<?php
session_start();

require_once __DIR__ . '/../../../models/classes/Exemplaire.php';
require_once __DIR__ . '/../../../repositories/donnees/ExemplaireRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     $idLivre = $_SESSION['idLivre'];
     $Etat = trim($_POST['etat']);
     $quantite =(int) $_POST['quantite'];

     for ($i=0; $i <$quantite ; $i++) { 
          $exemplaire = new Exemplaire(null,$idLivre,$Etat,true,'');
          $RepoExemplaire = new ExemplaireRepository();
          $RepoExemplaire ->CreationExemplaire($exemplaire);
     }

      
    $_SESSION['message'] = 'Exemplaire ajouté avec succès !';
    $_SESSION['message_type'] = 'success';
     unset($_SESSION['idLivre']);
       header('location: ../exemplaire.php');
          die();
}
else
     {
          header('location: ../exemplaire.php');
          die();
     }