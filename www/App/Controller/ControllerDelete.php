<?php

namespace App\Controller;

use App\Model\Veiculo;

class ControllerDelete
{
    private $model;
    private $parameter;

    public function defaultMethod($parameter = null)
    {
        if (isset($parameter)) {

            $this->model = new Veiculo;

            $this->model->id = $parameter;

            #--Call a function to delete data from DataBase--
            SESSION_START();
            if ($this->model->delete()) {
                $_SESSION['success'] = [
                    'success' => 1,
                    'msg' => 'Veículos removidos'
                ];
            } else {
                $_SESSION['success'] = [
                    'success' => 0,
                    'msg' => 'Erro ao remover veículos'
                ];
            }

            header("location: ../");
        } else {
            echo "Erro: Parâmetro não informado";
        };
    }
}
