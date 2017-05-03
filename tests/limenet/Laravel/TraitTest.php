<?php

use Illuminate\Database\Eloquent\Model as Base;
use limenet\Laravel\Model;
use PHPUnit\Framework\TestCase;

class TraitTest extends TestCase
{
    protected $model;

    protected function setUp() : void
    {
        $this->model = new Model();
    }

    public function testInitialized() : void
    {
        $this->assertInstanceOf(Base::class, $this->model);
    }
}
