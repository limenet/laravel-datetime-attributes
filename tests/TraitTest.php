<?php

declare(strict_types=1);

namespace Limenet\LaravelDatetimeAttributes\Tests;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Base;
use PHPUnit\Framework\TestCase;

class TraitTest extends TestCase
{
    protected $model;

    protected function setUp(): void
    {
        $this->model = new Model;
    }

    public function test_initialized(): void
    {
        $this->assertInstanceOf(Base::class, $this->model);
    }

    public function test_date_attribute_class(): void
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->assertInstanceOf(Carbon::class, $this->model->start);
    }

    public function test_date_attribute_after_save_class(): void
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertInstanceOf(Carbon::class, $this->model->start);
        $this->assertInstanceOf(Carbon::class, Model::find($this->model->id)->start);
    }

    public function test_empty_date_attribute_class(): void
    {
        $this->assertNull($this->model->start);
    }

    public function test_get_date(): void
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function test_get_time(): void
    {
        $this->model->start = Carbon::parse('2014-05-28 23:15');
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function test_set_date(): void
    {
        $this->model->start_date = '2014-05-28';
        $this->model->save();

        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function test_set_time(): void
    {
        $this->model->start_time = '23:15';
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function test_set_empty_time(): void
    {
        $this->model->start_date = '2014-05-28';
        $this->model->start_time = null;
        $this->model->save();

        $this->assertSame('2014-05-28 00:00:00', (string) $this->model->start);
        $this->assertSame('2014-05-28', $this->model->start_date);
        $this->assertSame('2014-05-28 00:00:00', (string) Model::find($this->model->id)->start);
        $this->assertSame('2014-05-28', Model::find($this->model->id)->start_date);
    }

    public function test_set_empty_date(): void
    {
        $this->model->start_date = null;
        $this->model->start_time = '23:15';
        $this->model->save();

        $this->assertSame('23:15', $this->model->start_time);
        $this->assertSame('23:15', Model::find($this->model->id)->start_time);
    }

    public function test_set_date_time_null(): void
    {
        $this->model->start_date = null;
        $this->model->start_time = null;
        $this->model->save();

        $this->assertNull($this->model->start_time);
        $this->assertNull(Model::find($this->model->id)->start_time);
    }
}
