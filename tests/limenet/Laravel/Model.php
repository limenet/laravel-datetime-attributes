<?php

namespace limenet\Laravel;

use Illuminate\Database\Eloquent\Model as Base;
use limenet\Laravel\DateTimeTrait;

class Model extends Base
{
    use DateTimeTrait;

    public function getStartDateAttribute()
    {
        return $this->dtGetDate('start');
    }

    public function getStartTimeAttribute()
    {
        return $this->dtGetTime('start');
    }

    public function setStartDateAttribute($value)
    {
        $this->dtSetDate('start', $value);
    }

    public function setStartTimeAttribute($value)
    {
        $this->dtSetTime('start', $value);
    }
}
