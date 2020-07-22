<?php

use PHPUnit\Framework\TestCase;
use App\Model\Veiculo;

set_include_path('D:\ProgrammingProjects\dockerConcessionaria/www/');

class VeiculoTest extends TestCase
{
    public function setUp()
    {
        $this->model = new Veiculo;
    }

    public function test_if_search_returns_an_array()
    {
        $this->assertIsArray($this->model->search());
    }

    public function test_if_delete_returns_bool()
    {
        $this->assertIsBool($this->model->delete());
    }

    public function test_if_add_returns_bool()
    {
        $this->assertIsBool($this->model->add());
    }

    public function test_if_update_returns_bool()
    {
        $this->assertIsBool($this->model->update());
    }
}
