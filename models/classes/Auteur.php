<?php
class Auteur 
{
    private $idAuteur;
    private $nom ;
    private $prenom;
    private $nationnalite;
    private $date_de_naissance;

    public function __construct($idAuteur,$nom,$prenom,$nationnalite,$date_de_naissance)
    {
        $this->idAuteur= $idAuteur;
       $this->nom = $nom;
       $this->prenom = $prenom;
       $this->date_de_naissance = $date_de_naissance ;
       $this->nationnalite= $nationnalite;
    }

    // les getters.

    public function getIdAuteur ():string
    {
        return $this->idAuteur;
    }

    public function getNom():string
    {
        return $this -> nom;
    }

    public function getPrenom():string
    {
        return $this -> prenom;
    }

    public function getNationnatile():string
    {
        return $this-> nationnalite;
    }

    public function getDate_de_naissance():string
    {
        return $this -> date_de_naissance;
    }

    // les setters

    public function setIdAuteur($idAuteur) {
        $this -> idAuteur = $idAuteur;
    }

    public function setNom($nom){
        $this -> nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this -> prenom = $prenom;
    }

    public function setNationnalite($nationnalite){
        $this -> nationnalite= $nationnalite;
    }

    public function setDate_de_naissance($date_de_naissance)
    {
        $this->date_de_naissance=$date_de_naissance;
    }
    
    // le getter du nom complet.

    public function getNomComplet():string
    {
        return $this->getPrenom() .' '. $this->getNom();
    }

}