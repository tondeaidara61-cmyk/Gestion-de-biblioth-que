<?php
class Livre
{
    private $idLivre;
    private $titre;
    private $genre;
    private $annee_de_publication;
    private $idAuteur;


    public function __construct($idLivre,$titre,$genre,$annee_de_publication,$idAuteur)
    {
        $this -> idLivre=$idLivre;
        $this -> titre = $titre;
        $this-> genre = $genre;
        $this-> annee_de_publication = $annee_de_publication;
        $this-> idAuteur = $idAuteur;
    }

    public function getTitle():string
    {
        return $this->titre;
    }

    public function getIdLivre():string
    {
        return $this->idLivre;
    }
    
    public function getGenre():string
    {
        return $this->genre;
    }

    
    public function getAnnee_de_publication():string
    {
        return $this->annee_de_publication;
    }
    
    
    public function getIdAuteur():string
    {
        return $this->idAuteur;
    }

}