<?php
require_once __DIR__. '/../../config/database.php';
require_once __DIR__. '/../../models/classes/Livre.php';


class LivreRepository
{
        private $pdo;

        public function __construct()
        {
          $this -> pdo = Database::getInstance()->getConnexion();
        }

        public function CreateLivre(Livre $livre):int
        {
            $sql="INSERT INTO Livre (titre,genre,annee_publication,id_auteur) VALUES (:tle,:genre,:a_p,:id)";

            $smt = $this-> pdo -> prepare($sql);
            $smt->execute(
                [
                    ':tle'=> $livre ->getTitle(),
                    ':genre'=> $livre->getGenre(),
                    ':a_p'=>$livre ->getAnnee_de_publication(),
                    ':id'=> $livre->getIdAuteur()
                ]
            );
            
    return (int) $this->pdo->lastInsertId();

        }
        
    

}