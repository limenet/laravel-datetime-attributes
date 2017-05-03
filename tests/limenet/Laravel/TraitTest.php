<?php

use Illuminate\Database\Eloquent\Model as Base;
use limenet\Laravel\Model;
use PHPUnit\Framework\TestCase;

class TraitTest extends TestCase
{
    protected $model;

    protected function setUp()
    {
        $this->model = new Model();
    }

    public function testInitialized()
    {
        $this->assertInstanceOf(Base::class, $this->model);
    }
}
