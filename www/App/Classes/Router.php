<?php

namespace App\Classes;

require_once("vendor/autoload.php");

class Router
{

    private $routes;
    private $uri;
    private $MethodWhoAcceptsParameters;
    private $MethodWhoDoesntAcceptsParameters;


    function __construct()
    {
        $this->parseUrl();
        $this->getRoutes();
        $this->getMethodWhoAcceptsParameters();
        $this->getWhoDoesntAcceptParameter();
    }

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            $this->uri = explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);
        } else {
            header("location: listar");
        }
        return $this->uri;
    }

    public function getRoutes(): array
    {
        $this->routes = array(
            "listar" => "ControllerList",
            "relatorio" => "ControllerPrint",
            "adicionar" => "ControllerAdd",
            "editar" => "ControllerUpdate",
            "deletar" => "ControllerDelete"
        );

        return $this->routes;
    }

    public function getWhoDoesntAcceptParameter(): array
    {
        $this->MethodWhoDoesntAcceptsParameters = array(
            "ControllerAdd",
            "CotnrollerPrint"
        );

        return $this->MethodWhoDoesntAcceptsParameters;
    }

    public function getMethodWhoAcceptsParameters(): array
    {
        $this->MethodWhoAcceptsParameters = array(
            "ControllerUpdate/numeric/defaultMethod",
            "ControllerUpdate/numeric/save",
            "ControllerDelete/numeric/defaultMethod",
            "ControllerList/string/ajaxCall"
        );

        return $this->MethodWhoAcceptsParameters;
    }

    public function callController()
    {

        #Check valid route - error 404
        if (array_key_exists($this->uri[0], $this->routes)) {

            $controllerName = $this->routes[$this->uri[0]];

            #Check route implementation - error 405
            if (file_exists(DIR_CONTROLLER . $controllerName . ".php")) {

                if (!in_array($controllerName, $this->MethodWhoDoesntAcceptsParameters)) {
                    switch (count($this->uri)) {
                        case 1:
                            $this->uri["method"] = "defaultMethod";
                            break;
                        case 2:
                            $this->uri["method"] = "defaultMethod";
                            $this->uri["parameter"] = $this->uri[1];
                            break;
                        case 3:
                            $this->uri["parameter"] = $this->uri[2];
                            $this->uri["method"] = $this->uri[1];
                            break;
                    }
                } else {
                    switch (count($this->uri)) {
                        case 1:
                            $this->uri["method"] = "defaultMethod";
                            break;
                        case 2:
                            $this->uri["method"] = $this->uri[1];
                            break;
                    }
                }

                $method = $this->uri["method"];

                #Update/Delete parameter ID
                foreach ($this->MethodWhoAcceptsParameters as $k => $v) {
                    $value = explode("/", $v);
                    if ($controllerName == $value[0] && $method == $value[2]) {
                        if ($value[1] == "numeric") {
                            #Preg - only numeric
                            $parameter = (isset($this->uri["parameter"]) && preg_match('/^[0-9]{1,}/', $this->uri["parameter"])) ? $this->uri["parameter"] : null;
                        } else {
                            $parameter = filter_var($this->uri["parameter"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                        }
                    }
                }

                $nameSpace = "App\\Controller\\{$controllerName}";
                $object = new $nameSpace;

                if (empty($this->uri["parameter"])) {
                    $object->$method();
                } else {
                    if ($method == "ajaxCall") {
                        $arrParameters = explode("|", $parameter);
                        $object->$method($arrParameters[0], $arrParameters[1]);
                    } else {
                        $object->$method($parameter);
                    }
                }
            } else {
                echo "ERRO 405: Método não implementado";
            }
        } else {
            echo "ERRO 404: Esta página não existe";
        }
    }
}
