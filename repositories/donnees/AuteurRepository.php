<?php
require_once __DIR__. '/../../config/database.php';
require_once __DIR__. '/../../models/classes/Auteur.php';

class AuteurRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this -> pdo=Database::getInstance()->getConnexion();
    }
   public function CreateAuteur(Auteur $auteur): int
{
    $sql = "INSERT INTO Auteur (nom, prenom, nationalite, date_naissance) 
            VALUES (:nom, :prenom, :nationalite, :date_naissance)";
    $smt = $this->pdo->prepare($sql);
    $smt->execute([
        'nom'            => $auteur->getNom(),
        'prenom'         => $auteur->getPrenom(),
        'nationalite'    => $auteur->getNationnatile(),
        'date_naissance' => $auteur->getDate_de_naissance()
    ]);

    return (int) $this->pdo->lastInsertId();
}
public function afficherAuteurs(): array
{
    $sql = "SELECT * FROM auteur";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();

    $auteurs = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $auteurs[] = new Auteur(
            $row['id_auteur'],
            $row['nom'],
            $row['prenom'],
            $row['nationalite'],
            $row['date_naissance']
        );
    }

    return $auteurs;
}

public function trouverParNomPrenom(string $nom, string $prenom): ?Auteur
{
    $sql = "SELECT * FROM auteur WHERE nom = :nom AND prenom = :prenom LIMIT 1";

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([
        'nom' => $nom,
        'prenom' => $prenom,
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return null;
    }

    return new Auteur(
        $row['id_auteur'],
        $row['nom'],
        $row['prenom'],
        $row['nationalite'],
        $row['date_naissance']
    );
}


}