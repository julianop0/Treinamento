<?php

namespace App\Classes;

require_once("vendor/autoload.php");

class Router
{

    private $routes;
    private $url;

    private $object;
    private $nameSpace;

    private $controllerName;
    private $method;
    private $parameter;

    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode("/", rtrim($_GET['url']), FILTER_SANITIZE_URL);
        } else {
            header("location: listar");
        }
    }

    public function getRoutes(): array
    {
        return [
            "listar" => "ControllerList",
            "relatorio" => "ControllerPrint",
            "adicionar" => "ControllerAdd",
            "editar" => "ControllerUpdate",
            "deletar" => "ControllerDelete"
        ];
    }

    public function getControllerName()
    {
        $this->url = $this->parseUrl();
        $this->routes = $this->getRoutes();
        return $this->routes[$this->url[0]];
    }

    public function validateRoute()
    {
        $this->url = $this->parseUrl();
        $this->routes = $this->getRoutes();
        $this->controllerName = $this->getControllerName();

        if (array_key_exists($this->url[0], $this->routes)) {
            if (!file_exists(DIR_CONTROLLER . $this->controllerName . ".php")) {
                echo "ERRO 405: Método não implementado";
            } else {
                return true;
            }
        } else {
            echo "ERRO 404: Esta página não existe";
        }
    }

    public function getDynamicControllers()
    {
        return [
            "ControllerUpdate" => "numeric",
            "ControllerDelete" => "numeric",
            "ControllerList" => "string"
        ];
    }

    public function setMethodAndParameter()
    {
        $this->url = $this->parseUrl();

        if (array_key_exists($this->getControllerName(), $this->getDynamicControllers())) {
            switch (count($this->url)) {
                case 1:
                    $this->method = "defaultMethod";
                    break;
                case 2:
                    $this->method = "defaultMethod";
                    $this->parameter = $this->url[1];
                    break;
                case 3:
                    $this->parameter = $this->url[2];
                    $this->method = $this->url[1];
                    break;
            }
        } else {
            switch (count($this->url)) {
                case 1:
                    $this->method = "defaultMethod";
                    break;
                case 2:
                    $this->method = $this->url[1];
                    break;
            }
        }
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getParameter()
    {
        return $this->parameter;
    }

    public function validateParameter()
    {
        foreach ($this->getDynamicControllers() as $k => $v) {
            $value = explode("/", $v);
            if ($this->getControllerName() == $value[0]) {
                if ($value[1] == "numeric") {
                    #Preg - only numeric
                    $this->parameter = (preg_match('/^[0-9]{1,}/', $this->parameter)) ? $this->uri["parameter"] : null;
                } else {
                    $this->parameter = filter_var($this->parameter, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                }
            }
        }
    }

    public function  callController()
    {
        if ($this->validateRoute()) {
            $this->setMethodAndParameter();
            if (array_key_exists($this->getControllerName(), $this->getDynamicControllers())) {
                $this->validateParameter();
            }

            $this->nameSpace = "App\\Controller\\{$this->getControllerName()}";
            $this->object = new $this->nameSpace;

            $method = $this->getMethod();
            $this->parameter = $this->getParameter();

            if (empty($this->parameter)) {
                $this->object->$method();
            } else {
                if ($this->method == "ajaxCall") {
                    $arrParameters = explode("|", $this->parameter);
                    $this->object->$method($arrParameters[0], $arrParameters[1]);
                } else {
                    $this->object->$method($this->parameter);
                }
            }
        }
    }
}
