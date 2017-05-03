# laravel-datetime-attributes

[![Build Status](https://travis-ci.org/limenet/laravel-datetime-attributes.svg?branch=master)](https://travis-ci.org/limenet/laravel-datetime-attributes) [![Latest Stable Version](https://poser.pugx.org/limenet/laravel-datetime-attributes/v/stable)](https://packagist.org/packages/limenet/laravel-datetime-attributes) [![License](https://poser.pugx.org/limenet/laravel-datetime-attributes/license)](https://packagist.org/packages/limenet/laravel-datetime-attributes) [![Total Downloads](https://poser.pugx.org/limenet/laravel-datetime-attributes/downloads)](https://packagist.org/packages/limenet/laravel-datetime-attributes) [![StyleCI](https://styleci.io/repos/72880731/shield)](https://styleci.io/repos/72880731) [![codecov](https://codecov.io/gh/limenet/laravel-datetime-attributes/branch/master/graph/badge.svg)](https://codecov.io/gh/limenet/laravel-datetime-attributes)

Set a `datetime` attribute separately using a `date` and a `time`. This is especially helpful for `input[type=date]` and `input[type=time]`

## Usage

```php
<?php

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

```