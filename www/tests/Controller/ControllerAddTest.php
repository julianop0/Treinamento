<?php

use PHPUnit\Framework\TestCase;
use App\Controller\ControllerAdd;

class ControllerAddTes extends TestCase
{

    public function setUp()
    {
        $this->controller = new ControllerAdd();
    }

    public function test_default_method()
    {

        $expected = "<title>Adicionar Veículos</title>";
        $output = $this->controller->defaultMethod();
        $this->assertStringContainsString($output, $expected);
    }
}
