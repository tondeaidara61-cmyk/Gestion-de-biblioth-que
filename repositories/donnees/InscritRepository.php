<?php
require_once __DIR__ .'/../../config/database.php';
require_once __DIR__ . '/../../models/classes/Inscrit.php';
require_once __DIR__ . '/../donnees/ExemplaireRepository.php';

class InscritRepository extends ExemplaireRepository {
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

    public function VerificationEmail(Inscrit $verification)
      {
        $stmt =$this->pdo->prepare("SELECT COUNT(*) FROM inscrit WHERE email = :email");
        $stmt->execute(['email' => $verification->getEmail()]);
        $exists = $stmt->fetchColumn();

        if ($exists > 0) {
          return true;
        } else {
           return false;
        }
    }
    
}