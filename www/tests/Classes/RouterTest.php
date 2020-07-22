<?php

use PHPUnit\Framework\TestCase;
use App\Classes\Router;


class RouterTest extends TestCase
{
    public function setUp()
    {
        //$_GET[url] = listar - está sendo declarado no arquivo phpunit.xml
        $this->router = new Router;
    }

    public function test_if_parseUrl_is_returning_an_array()
    {
        $this->assertIsArray($this->router->parseUrl());
    }

    public function test_if_route_is_validated()
    {
        $this->assertTrue($this->router->validateRoute());
    }

    public function test_if_getRoutes_returns_correct_data()
    {
        $this->assertEquals([
            "listar" => "ControllerList",
            "relatorio" => "ControllerPrint",
            "adicionar" => "ControllerAdd",
            "editar" => "controllerUpdate",
            "deletar" => "ControllerDelete"
        ], $this->router->getRoutes());
    }

    public function test_if_getDynamicControllers_returns_correct_data()
    {
        $this->assertEquals([
            "controllerUpdate" => "numeric",
            "ControllerDelete" => "numeric",
            "ControllerList" => "string"
        ], $this->router->getDynamicControllers());
    }

    public function test_if_is_linking_with_correct_controllerName()
    {
        $this->assertEquals("ControllerList", $this->router->getControllerName());
    }

    public function test_if_is_settings_correct_method_and_parameter()
    {
        $this->router->setMethodAndParameter();

        $this->assertEquals('defaultMethod', $this->router->getMethod());
        $this->assertEquals(null, $this->router->getParameter());
    }
}
