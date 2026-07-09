<?php
require_once __DIR__. '/../../config/database.php';
require_once __DIR__. '/../../models/classes/Livre.php';


class LivreRepository
{
        private $pdo;

        public function __construct()
        {
          $this -> pdo = Database::getInstance()->getConnexion();
        }
}