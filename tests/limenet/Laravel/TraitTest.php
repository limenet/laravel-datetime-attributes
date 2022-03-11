<?php

declare(strict_types=1);

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Base;
use limenet\Laravel\Model;
use PHPUnit\Framework\TestCase;

class TraitTest extends TestCase
{
    protected $model;

    protected function setUp(): void
    {
        $this->model = new Model();
    }

    public function testInitialized(): void
    {
        $this->assertInstanceOf(Base::class, $this->model);
    }

    public function testDateAttributeClass(): void
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->assertInstanceOf(Carbon::class, $this->model->start);
    }

    public function testDateAttributeAfterSaveClass(): void
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertInstanceOf(Carbon::class, $this->model->start);
        $this->assertInstanceOf(Carbon::class, Model::find($this->model->id)->start);
    }

    public function testEmptyDateAttributeClass(): void
    {
        $this->assertNull($this->model->start);
    }

    public function testGetDate(): void
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function testGetTime(): void
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function testSetDate(): void
    {
        $this->model->start_date = '2014-05-28';
        $this->model->save();

        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function testSetTime(): void
    {
        $this->model->start_time = '23:15';
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function testSetEmptyTime(): void
    {
        $this->model->start_date = '2014-05-28';
        $this->model->start_time = null;
        $this->model->save();

        $this->assertSame('2014-05-28 00:00:00', (string) $this->model->start);
        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28 00:00:00', (string) Model::find($this->model->id)->start);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function testSetEmptyDate(): void
    {
        $this->model->start_date = null;
        $this->model->start_time = '23:15';
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function testSetDateTimeNull(): void
    {
        $this->model->start_date = null;
        $this->model->start_time = null;
        $this->model->save();

        $this->assertNull($this->model->start_time);
        $this->assertNull(Model::find($this->model->id)->start_time);
    }
}
