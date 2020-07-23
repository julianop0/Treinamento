<?php

namespace App\Controller;

use App\Model\Veiculo;

class ControllerList
{

    private $model;
    private $busca;

    public function defaultMethod()
    {

        $title = "Listagem de veículos";
        require_once DIR_VIEW . "list.php";
    }

    public function ajaxCall($parameter = "", $pagina = 1): void
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET") {

            $this->model = new Veiculo;

            #--Set--
            $this->busca = '%' . $parameter . '%';
            $this->model->pagina = $pagina;

            $res = $this->model->search($this->busca);
            http_response_code(200);
            echo json_encode($res);
        } else {
            $retorno = [
                "sucesso" => false,
                "mensagem" => "Metodo HTTP incorreto"
            ];

            http_response_code(405);
            echo json_encode($retorno);
        }
    }
}
