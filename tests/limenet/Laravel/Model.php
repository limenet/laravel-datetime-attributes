<?php

declare(strict_types=1);

namespace limenet\Laravel;

use Illuminate\Database\Eloquent\Model as Base;

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
