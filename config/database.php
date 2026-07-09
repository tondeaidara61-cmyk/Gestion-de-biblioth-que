<?php

class Database
{
    private static ?Database $instance = null;
    private PDO $connexion;

    private string $db_name;
    private string $db_host;
    private string $db_user;
    private string $db_pass;

    // Le constructeur est privé : personne ne peut faire "new Database()" de l'extérieur
   
  private function  __construct($db_name, $db_host,$db_user,$db_pass)
  {
    $this->db_host = $db_host;
    $this->db_user=$db_user;
    $this ->db_pass= $db_pass;
    $this -> db_name = $db_name;
  

        try {
            $dsn = "mysql:host={$this->db_host};dbname={$this->db_name};charset=utf8mb4";
            
            $this->connexion = new PDO($dsn, $this->db_user, $this->db_pass, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    // Point d'accès unique à l'instance (crée la connexion une seule fois)
    public static function getInstance(string $db_name = 'gestion_bibliotheque'): Database
    {
        if (self::$instance === null) {
            $config = require_once __DIR__ . '/../config/db_config.php';
    
            self::$instance = new self($config['db_name'],$config['db_host'],$config['db_user'],$config['db_pass']);
        }
        return self::$instance;
    }

    // Retourne l'objet PDO pour exécuter des requêtes
    public function getConnexion(): PDO
    {
        return $this->connexion;
    }

    // Empêche la duplication de l'instance via clone
    private function __clone() {}
}