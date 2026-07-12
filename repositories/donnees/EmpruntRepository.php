<?php 
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/classes/Emprunt.php';
require_once __DIR__ . '/../../repositories/donnees/InscritRepository.php';
require_once __DIR__ . '/../../repositories/donnees/ExemplaireRepository.php';

class EmpruntRepository extends  InscritRepository  
{
     private PDO $pdo;

     public function __construct()
     {
          $this -> pdo=Database::getInstance()->getConnexion();
     }

     public function CreationEmprunt(Emprunt $emprunt)
{
    $sql = "INSERT INTO emprunt (id_exemplaire, id_inscrit, date_emprunt, delai_jours) 
            VALUES (:id_exemplaire, :id_inscrit, :date_emprunt, :delai_jours)";

    $smt = $this->pdo->prepare($sql);
    $smt->execute([
        ":id_exemplaire" => $emprunt->getIdExemplaire(),
        ":id_inscrit"    => $emprunt->getIdInscrit(),
        ":date_emprunt"  => $emprunt->getDateEmprunt(),
        ":delai_jours"   => $emprunt->getDelaiJours()
    ]);
}


}
