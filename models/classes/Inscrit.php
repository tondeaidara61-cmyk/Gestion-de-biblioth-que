<?php
class Inscrit
{
    private $idInscrit;
    private $nom;
    private $prenom;
    private $email;
    private $numero;

    public function __construct($idInscrit,$nom,$prenom,$email,$numero)
    {
        $this ->idInscrit=$idInscrit;
        $this->nom=$nom;
        $this ->prenom = $prenom;
        $this ->email=$email;
        $this ->numero = $numero;
    }

    public function getNom():string{
        return $this->nom;
    }

    public function getPrenom():string{
        return $this->prenom;
    }

    public function getEmail():string{
        return $this -> email;
    }

    public function getNumero()
    {
        return $this -> numero;
    }

    public function getIdInscrit()
    {
        return $this-> idInscrit;
    }

}