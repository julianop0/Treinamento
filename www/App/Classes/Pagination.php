<?php

namespace App\Classes;

require_once("vendor/autoload.php");

use \PDO;
use PDOException;
use App\Classes\DbConnect;

class Pagination
{
    private $connection;

    protected $offset;
    protected $limit =  6;

    public function getOffset($p)
    {
        $this->offset = ($p == 1) ? 0 : ($p - 1) * $this->limit;
        return $this->offset;
    }

    public function getLimit()
    {
        return $this->limit;
    }

    public function getTotalRecords($query = null, $binds = null)
    {
        //Create the PDO connection
        $this->connection = (new DbConnect)->connect();

        if (isset($query) && isset($binds)) {
            $stmt = $this->connection->prepare($query);

            foreach ($binds as $k => $v) {
                $stmt->bindValue($k, $v);
            }
        } else {
            $query = "SELECT * FROM veiculos";

            $stmt = $this->connection->prepare($query);
        }
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function getTotalPages($query = null, $binds = null)
    {
        $a = $this->getTotalRecords($query, $binds);
        return ceil($this->getTotalRecords($query, $binds) / $this->limit);
    }
}
