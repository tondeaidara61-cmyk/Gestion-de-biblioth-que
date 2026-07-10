<?php
require_once __DIR__ .'/../../config/database.php';
require_once __DIR__ . '/../../models/classes/Inscrit.php';

class InscritRepository {
    private $pdo; 

    public function __construct()
    {
        $this->pdo=Database::getInstance()->getConnexion();
    }

    public function CreationInscrit(Inscrit $inscription)
    {
        $sql ="INSERT INTO inscrit (nom,prenom,email,telephone) VALUES (:nom,:prenom,:email,:tel)";

        $smt = $this->pdo ->prepare($sql);
        $smt -> execute([
            ":nom"=>$inscription->getNom(),
            ":prenom"=>$inscription->getPrenom(),
            ":email"=>$inscription->getEmail(),
            ":tel"=>$inscription ->getNumero()
        ]);

    }
    
}