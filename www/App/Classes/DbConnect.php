<?php

namespace App\Classes;

use \PDO;
use PDOException;

require_once("vendor/autoload.php");

class DbConnect
{
    private $connection;

    public function connect()
    {
        try {
            $dsn = 'mysql:host=' . HOST . ';port=' . PORT . ';dbname=' . BASE;
            $this->connection = new PDO($dsn, USER, PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
