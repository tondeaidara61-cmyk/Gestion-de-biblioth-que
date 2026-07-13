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
        
    public function afficherLivres(): array
{
    $sql = "SELECT 
                l.id_livre, 
                l.titre, 
                l.genre, 
                l.annee_publication,
                a.id_auteur,
                a.nom AS nom_auteur,
                a.prenom AS prenom_auteur
            FROM livre l
            JOIN auteur a ON l.id_auteur = a.id_auteur
            ORDER BY l.titre";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}