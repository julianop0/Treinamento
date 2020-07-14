<?php

namespace App\Controller;

use App\Model\Veiculo;

class ControllerAdd
{

    private $model;

    public function defaultMethod()
    {

        //Como o adicionar e o save estão em camadas diferentes, tipo '/adicionar' e '/editar/id'
        //tive que criar uma variávels para linkar a outras pastas do projeto
        $hrefBootstrap = "public/bootstrap4.5.0/css/bootstrap.min.css";
        $hrefCancel = "listar";
        $hrefJquery = "public/javascript/Jquery.min.js";
        $hrefMask = "public/javascript/jquery.mask.min.js";
        $hrefValidation = "App/views/javascript/form.js";

        $title = "Adicionar veículos";
        $formAction = "adicionar/save";
        require_once DIR_VIEW . "form.php";
    }

    public function save()
    {

        $this->model = new Veiculo;

        #--Sets--
        $this->model->descricao = $_POST['descricao'];
        $this->model->placa = $_POST['placa'];
        $this->model->codigo_renavam = $_POST['codigoRenavam'];
        $this->model->ano_modelo = $_POST['anoModelo'];
        $this->model->ano_fabricacao = $_POST['anoFabricacao'];
        $this->model->cor = $_POST['cor'];
        $this->model->km = $_POST['km'];
        $this->model->marca = $_POST['marca'];
        $this->model->preco = $_POST['preco'];
        $this->model->preco_fipe = $_POST['precoFipe'];

        #--Call a function to insert a value into DataBase--
        SESSION_START();
        if ($this->model->add()) {
            $_SESSION['success'] = [
                'success' => 1,
                'msg' => 'Veículo adicionado com sucesso'
            ];
        } else {
            $_SESSION['success'] = [
                'success' => 0,
                'msg' => 'Erro ao adicionar veículo'
            ];
        }
        header("location: ../");
    }
}
