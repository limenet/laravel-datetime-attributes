# This is my package laravel-datetime-attributes

[![Latest Version on Packagist](https://img.shields.io/packagist/v/limenet/laravel-datetime-attributes.svg?style=flat-square)](https://packagist.org/packages/limenet/laravel-datetime-attributes)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/limenet/laravel-datetime-attributes/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/limenet/laravel-datetime-attributes/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/limenet/laravel-datetime-attributes/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/limenet/laravel-datetime-attributes/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/limenet/laravel-datetime-attributes.svg?style=flat-square)](https://packagist.org/packages/limenet/laravel-datetime-attributes)

Set a `datetime` attribute separately using a `date` and a `time`. This is especially helpful for `input[type=date]` and `input[type=time]`

## Usage

```php
<?php

use Illuminate\Database\Eloquent\Model as Base;
use Limenet\LaravelDatetimeAttributes\DateTimeTrait;

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
