<?php

namespace App\Model;

require_once("vendor/autoload.php");

use \PDO;
use PDOException;
use App\Classes\DbConnect;
use App\Classes\Pagination;

class Veiculo
{
    private $connection;
    private $stmt;

    private $id;
    private $descricao;
    private $placa;
    private $codigo_renavam;
    private $ano_modelo;
    private $ano_fabricacao;
    private $cor;
    private $km;
    private $marca;
    private $preco;
    private $preco_fipe;

    //Parâmetros AJAX enviados via GET
    private $searchParameter;
    private $pagina;

    public function __construct()
    {
        $this->connection = (new DbConnect)->connect();
    }

    #--Magic Get--
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    #--Magic Set--
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    public function selectAll()
    {
        if (isset($this->id)) {
            $query = "SELECT * FROM veiculos WHERE id = :id";

            $stmt = $this->connection->prepare($query);
            $stmt->bindValue(':id', $this->id);

            $aux = "fetch";
        } else {
            $query = "SELECT * FROM veiculos";

            $stmt = $this->connection->prepare($query);

            $aux = "fetchAll";
        }

        $stmt->execute();

        return $stmt->$aux(PDO::FETCH_ASSOC);
    }

    public function add()
    {
        $query = "INSERT INTO veiculos (descricao,placa,codigo_renavam,ano_modelo,
                                ano_fabricacao,cor,km,marca,preco,preco_fipe)
                       VALUES (:descricao, :placa, :codigo_renavam, :ano_modelo,
                                :ano_fabricacao, :cor, :km, :marca, :preco, :preco_fipe)";

        $stmt = $this->connection->prepare($query);

        #--BindValues--
        $stmt->bindValue(":descricao", $this->descricao);
        $stmt->bindValue(":placa", $this->placa);
        $stmt->bindValue(":codigo_renavam", $this->codigo_renavam);
        $stmt->bindValue(":ano_modelo", $this->ano_modelo);
        $stmt->bindValue(":ano_fabricacao", $this->ano_fabricacao);
        $stmt->bindValue(":cor", $this->cor);
        $stmt->bindValue(":km", $this->km);
        $stmt->bindValue(":marca", $this->marca);
        $stmt->bindValue(":preco", $this->preco);
        $stmt->bindValue(":preco_fipe", $this->preco_fipe);

        if (!$stmt->execute()) {
            return false;
        }
        return true;
    }

    public function update()
    {
        $query = "UPDATE veiculos
                     SET descricao = :descricao,
                         placa = :placa,
                         codigo_renavam = :codigo_renavam,
                         ano_modelo = :ano_modelo,
                         ano_fabricacao = :ano_fabricacao,
                         cor = :cor,
                         km = :km,
                         marca = :marca,
                         preco = :preco,
                         preco_fipe = :preco_fipe
                   WHERE id = :id";

        $stmt = $this->connection->prepare($query);

        #--BindValues--
        $stmt->bindValue(":descricao", $this->descricao);
        $stmt->bindValue(":placa", $this->placa);
        $stmt->bindValue(":codigo_renavam", $this->codigo_renavam);
        $stmt->bindValue(":ano_modelo", $this->ano_modelo);
        $stmt->bindValue(":ano_fabricacao", $this->ano_fabricacao);
        $stmt->bindValue(":cor", $this->cor);
        $stmt->bindValue(":km", $this->km);
        $stmt->bindValue(":marca", $this->marca);
        $stmt->bindValue(":preco", $this->preco);
        $stmt->bindValue(":preco_fipe", $this->preco_fipe);
        $stmt->bindValue(":id", $this->id);

        if (!$stmt->execute()) {
            return false;
        }
        return true;
    }

    public function search()
    {
        $paginacao = new Pagination;

        $limit = $paginacao->getLimit();
        $offset = $paginacao->getOffset($this->pagina);


        if (isset($this->searchParameter)) {

            $query = "SELECT id,descricao,placa,marca
                        FROM veiculos
                       WHERE id LIKE :searchParameter0 OR
                             descricao LIKE :searchParameter1 OR
                             placa LIKE :searchParameter2 OR
                             marca LIKE :searchParameter3";

            $totalPaginas = $paginacao->getTotalPages($query, [
                ':searchParameter0' => $this->searchParameter,
                ':searchParameter1' => $this->searchParameter,
                ':searchParameter2' => $this->searchParameter,
                ':searchParameter3' => $this->searchParameter
            ]);

            $paginaAtual = $this->pagina;

            $query .= " LIMIT :offset , :limit";

            $this->stmt = $this->connection->prepare($query);
            $this->stmt->bindValue(':searchParameter0', $this->searchParameter, PDO::PARAM_STR);
            $this->stmt->bindValue(':searchParameter1', $this->searchParameter, PDO::PARAM_STR);
            $this->stmt->bindValue(':searchParameter2', $this->searchParameter, PDO::PARAM_STR);
            $this->stmt->bindValue(':searchParameter3', $this->searchParameter, PDO::PARAM_STR);
            $this->stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $this->stmt->bindValue(':limit', $limit, PDO::PARAM_INT);

            $this->stmt->execute();

            $veiculos = $this->stmt->fetchAll(PDO::FETCH_ASSOC);

            return [
                'veiculos' => $veiculos,
                'paginaAtual' => $paginaAtual,
                'totalPaginas' => $totalPaginas
            ];
        }
        return [
            'erro' => 'Erro ao realizar busca'
        ];
    }

    public function delete()
    {
        $query = "DELETE FROM veiculos WHERE id IN ($this->id)";
        $stmt = $this->connection->prepare($query);

        if (!$stmt->execute()) {
            return false;
        }
        return true;
    }

    public function __destruct()
    {
        $this->connection = null;
    }
}
