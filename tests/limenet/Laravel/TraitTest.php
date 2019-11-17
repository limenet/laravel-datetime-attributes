<?php

use Carbon\Carbon;
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

    public function testDateAttributeClass()
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->assertInstanceOf(Carbon::class, $this->model->start);
    }

    public function testDateAttributeAfterSaveClass()
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertInstanceOf(Carbon::class, $this->model->start);
        $this->assertInstanceOf(Carbon::class, Model::find($this->model->id)->start);
    }

    public function testEmptyDateAttributeClass()
    {
        $this->assertNull($this->model->start);
    }

    public function testGetDate()
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function testGetTime()
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function testSetDate()
    {
        $this->model->start_date = '2014-05-28';
        $this->model->save();

        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function testSetTime()
    {
        $this->model->start_time = '23:15';
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function testSetEmptyTime()
    {
        $this->model->start_date = '2014-05-28';
        $this->model->start_time = null;
        $this->model->save();

        $this->assertSame('2014-05-28 00:00:00', (string) $this->model->start);
        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28 00:00:00', (string) Model::find($this->model->id)->start);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function testSetEmptyDate()
    {
        $this->model->start_date = null;
        $this->model->start_time = '23:15';
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function testSetDateTimeNull()
    {
        $this->model->start_date = null;
        $this->model->start_time = null;
        $this->model->save();

        $this->assertNull($this->model->start_time);
        $this->assertNull(Model::find($this->model->id)->start_time);
    }
}
