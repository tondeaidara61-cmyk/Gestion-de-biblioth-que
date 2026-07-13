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


public function afficherEmpruntsEnCours(): array
    {
        $sql = "SELECT 
                    e.id_emprunt,
                    e.date_emprunt,
                    e.date_echeance,
                    l.titre,
                    i.nom AS nom_inscrit,
                    i.prenom AS prenom_inscrit
                FROM emprunt e
                JOIN exemplaire ex ON e.id_exemplaire = ex.id_exemplaire
                JOIN livre l ON ex.id_livre = l.id_livre
                JOIN inscrit i ON e.id_inscrit = i.id_inscrit
                WHERE e.date_retour_effective IS NULL
                ORDER BY e.date_echeance ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ---------- Retour ----------

    public function marquerRendu(int $idEmprunt): void
    {
        $sql = "UPDATE emprunt SET date_retour_effective = CURDATE() WHERE id_emprunt = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $idEmprunt]);
    }

}
