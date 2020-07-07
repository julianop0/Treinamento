<?php

namespace App\Controller;

use App\Model\Veiculo;

class ControllerPrint {
    private $model;

    public function defaultMethod() {

        $this->model = new Veiculo;
        $title = "Relatório";
        $data = $this->model->selectAll();
        require_once DIR_VIEW . "print.php";
    }
}