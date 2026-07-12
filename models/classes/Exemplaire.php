<?php
class Exemplaire
{
     private $TitreLivre;
     private $IdExemplaire;
     private $IdLivre;
     private $Etat;
     private $disponibilite;

     public function __construct($IdExemplaire,$IdLivre,$Etat,$disponibilite,$TitreLivre)
     {
         $this ->disponibilite = $disponibilite;
         $this -> TitreLivre =$TitreLivre;
         $this ->Etat= $Etat;
         $this -> IdExemplaire = $IdExemplaire;
         $this ->IdLivre=$IdLivre;
     }

     public function getIdLivre():int{
          return $this ->IdLivre;
     }

     public function  getIdExemplaire() :int{
          return $this->IdExemplaire;
     }

     public function getTitreLivre() : string {
          return $this->TitreLivre;
     }

     public function getEtat():string
     {
          return $this->Etat;
     }

     public function getDisponibilite()
     {
          return $this ->disponibilite;
     }
}