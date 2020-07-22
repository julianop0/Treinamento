<?php

use App\Classes\DbConnect;
use PHPUnit\Framework\TestCase;
use App\Classes\Pagination;

set_include_path('D:\ProgrammingProjects\dockerConcessionaria/www/');

class PaginationTest extends TestCase
{
    public function setUp()
    {
        $this->pagination = new Pagination();
    }

    // public function test_GetTotalRecords()
    // {
    //     $conn = $this->createMock(DbConnect::class);
    //     $this->assertEquals(2, $this->getConnection()->getRowCount('guestbook'));
    // }

    public function test_if_getOffset_returns_correct_value()
    {
        $this->assertEquals(6, $this->pagination->getOffset(2));
    }
    public function test_if_getLimit_correct_value()
    {
        $this->assertEquals(6, $this->pagination->getLimit());
    }
}
