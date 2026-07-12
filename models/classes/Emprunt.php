<?php
class Emprunt
{
    private $idEmprunt;
    private $idExemplaire;
    private $idInscrit;
    private $dateEmprunt;
    private $delaiJours;
    private $dateEcheance;
    private $dateRetourEffective;

    public function __construct(
        $idEmprunt,
        $idExemplaire,
        $idInscrit,
        $dateEmprunt,
        $delaiJours,
        $dateEcheance = null,
        $dateRetourEffective = null
    ) {
        $this->idEmprunt = $idEmprunt;
        $this->idExemplaire = $idExemplaire;
        $this->idInscrit = $idInscrit;
        $this->dateEmprunt = $dateEmprunt;
        $this->delaiJours = $delaiJours;
        $this->dateEcheance = $dateEcheance;
        $this->dateRetourEffective = $dateRetourEffective;
    }

    // ---------- les getters ----------

    public function getIdEmprunt()
    {
        return $this->idEmprunt;
    }

    public function getIdExemplaire()
    {
        return $this->idExemplaire;
    }

    public function getIdInscrit()
    {
        return $this->idInscrit;
    }

    public function getDateEmprunt()
    {
        return $this->dateEmprunt;
    }

    public function getDelaiJours()
    {
        return $this->delaiJours;
    }

    public function getDateEcheance()
    {
        return $this->dateEcheance;
    }

    public function getDateRetourEffective()
    {
        return $this->dateRetourEffective;
    }

    // ---------- les setters ----------

    public function setIdEmprunt($idEmprunt): void
    {
        $this->idEmprunt = $idEmprunt;
    }

    public function setIdExemplaire($idExemplaire): void
    {
        $this->idExemplaire = $idExemplaire;
    }

    public function setIdInscrit($idInscrit): void
    {
        $this->idInscrit = $idInscrit;
    }

    public function setDateEmprunt($dateEmprunt): void
    {
        $this->dateEmprunt = $dateEmprunt;
    }

    public function setDelaiJours($delaiJours): void
    {
        $this->delaiJours = $delaiJours;
    }

    public function setDateEcheance($dateEcheance): void
    {
        $this->dateEcheance = $dateEcheance;
    }

    public function setDateRetourEffective($dateRetourEffective): void
    {
        $this->dateRetourEffective = $dateRetourEffective;
    }

  

    // Utile pour afficher directement si l'emprunt est encore en cours
    public function estEnCours(): bool
    {
        return $this->dateRetourEffective === null;
    }
}