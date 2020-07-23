<?php

namespace App\Controller;

use App\Model\Veiculo;

class ControllerDelete
{
    private $model;

    public function defaultMethod($parameters = null)
    {
        if (isset($parameters)) {

            $this->model = new Veiculo;


            #--Call a function to delete data from DataBase--
            SESSION_START();
            if ($this->model->delete($parameters)) {
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
