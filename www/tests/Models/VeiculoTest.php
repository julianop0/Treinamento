<?php

use PHPUnit\Framework\TestCase;
use App\Model\Veiculo;

set_include_path('D:\ProgrammingProjects\dockerConcessionaria/www/');

class VeiculoTest extends TestCase
{
    public function setUp()
    {
        $this->model = $this->getMockBuilder(veiculo::class)
            ->disableOriginalConstructor()
            ->setMethods(['search', 'delete', 'add', 'update', 'selectAll'])
            ->getMock();
    }

    public function test_if_search_returns_an_array()
    {
        $this->model->method('search')
            ->with('alguma coisa')
            ->willReturn(
                [
                    'veiculos' => [
                        'dados do veiculo' => 'dados'
                    ],
                    'paginaAtual' => 1,
                    'totalPaginas' => 2
                ]
            );

        $this->assertIsArray($this->model->search('alguma coisa'));
    }

    public function test_if_selectAll_returns_an_array()
    {
        $this->model->method('selectAll')
            ->willReturn(
                [
                    'id' => 1,
                    'descricao' => 'veiculo aut'
                ]
            );

        $this->assertIsArray($this->model->selectAll());
    }

    public function test_if_delete_returns_bool()
    {
        $this->model->method('delete')
            ->with('29')
            ->willReturn(true);

        $this->assertIsBool($this->model->delete('29'));
    }

    public function test_if_add_returns_bool()
    {
        $this->model->method('add')
            ->willReturn(true);

        $this->assertIsBool($this->model->add());
    }

    public function test_if_update_returns_bool()
    {
        $this->model->method('update')
            ->willReturn(true);

        $this->assertIsBool($this->model->update());
    }
}
