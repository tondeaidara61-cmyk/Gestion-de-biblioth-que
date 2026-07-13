<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/classes/Exemplaire.php';

class ExemplaireRepository
{
     private PDO  $pdo;

     public function __construct()
     {
         $this->pdo=Database::getInstance()->getConnexion();
     }

      public function CreationExemplaire(Exemplaire $exemplaire)
     {
     $sql = "INSERT INTO exemplaire (id_livre, etat, disponible) VALUES (:id_livre, :etat, :disponible)";

     $smt = $this->pdo->prepare($sql);
     $smt->execute([
          ":id_livre"   => $exemplaire->getIdLivre(),
          ":etat"       => $exemplaire->getEtat(),
          ":disponible" => $exemplaire->getDisponibilite()
     ]);
     }

     public function VerifieSiLIvreExiste(Exemplaire $exemplaire) :?int {
 $stmt = $this->pdo->prepare("SELECT id_livre FROM livre WHERE titre = :titre");
    $stmt->execute([':titre' => $exemplaire->getTitreLivre()]);

    $idLivre = $stmt->fetchColumn();

  return $idLivre !== false ? (int) $idLivre : null;
}

public function afficherExemplaires(): array
{
    $sql = "SELECT ex.id_exemplaire, ex.etat, ex.disponible, l.titre
            FROM exemplaire ex
            JOIN livre l ON ex.id_livre = l.id_livre
            ORDER BY l.titre";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}