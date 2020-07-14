<?php

namespace App\Controller;

use App\Model\Veiculo;

class ControllerUpdate
{

    private $model;
    private $parameter;

    public function defaultMethod($parameter = null)
    {

        if (isset($parameter)) {
            $this->model = new Veiculo;
            $this->model->id = $parameter;
            $dataUpdate = $this->model->selectAll();

            if (!empty($dataUpdate)) {
                //Como o adicionar e o save estão em camadas diferentes, tipo '/adicionar' e '/editar/id'
                //tive que criar uma variável para linkar a outras pastas do projeto
                $hrefBootstrap = "../public/bootstrap4.5.0/css/bootstrap.min.css";
                $hrefCancel = "../listar";
                $hrefJquery = "../public/javascript/Jquery.min.js";
                $hrefMask = "../public/javascript/jquery.mask.min.js";
                $hrefValidation = "../App/views/javascript/form.js";

                $title = "Ediçaõ do veículo";
                $formAction = "../editar/save/{$parameter}";
                require_once DIR_VIEW . "form.php";
            } else {
                echo "Erro: Veículo inexistente";
            }
        } else {
            echo "Erro: Parâmetro não informado";
        };
    }

    public function save($parameter)
    {

        $this->model = new Veiculo;

        #--Sets--
        $this->model->id = $parameter;
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

        #--Call a function to update data from DataBase--
        SESSION_START();
        if ($this->model->update()) {
            $_SESSION['success'] = [
                'success' => 1,
                'msg' => 'Veículo atualizado com sucesso'
            ];
        } else {
            $_SESSION['success'] = [
                'success' => 0,
                'msg' => 'Erro ao atualizar veículo'
            ];
        }

        header("location: ../../");
    }
}
