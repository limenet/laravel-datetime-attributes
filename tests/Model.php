<?php

declare(strict_types=1);

namespace Limenet\LaravelDatetimeAttributes\Tests;

use Illuminate\Database\Eloquent\Model as Base;
use Limenet\LaravelDatetimeAttributes\DateTimeTrait;

class Model extends Base
{
    use DateTimeTrait;

    public $timestamps = false;

    protected $casts = ['start' => 'datetime'];

    public function getStartDateAttribute()
    {
        return $this->dtGetDate('start');
    }

    public function getStartTimeAttribute()
    {
        return $this->dtGetTime('start');
    }

    public function setStartDateAttribute($value): void
    {
        $this->dtSetDate('start', $value);
    }

    public function setStartTimeAttribute($value): void
    {
        $this->dtSetTime('start', $value);
    }
}
