<?php
class Livre
{
    private $titre;
    private $genre;
    private $annee_de_publication;
    private $idAuteur;


    public function __construct($titre,$genre,$annee_de_publication,$idAuteur)
    {
        $this -> titre = $titre;
        $this-> genre = $genre;
        $this-> annee_de_publication = $annee_de_publication;
        $this-> idAuteur = $idAuteur;
    }

    
    

}