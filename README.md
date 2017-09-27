# laravel-datetime-attributes

[![Build Status](https://travis-ci.org/limenet/laravel-datetime-attributes.svg?branch=master)](https://travis-ci.org/limenet/laravel-datetime-attributes)
[![Latest Stable Version](https://poser.pugx.org/limenet/laravel-datetime-attributes/v/stable)](https://packagist.org/packages/limenet/laravel-datetime-attributes)
[![License](https://poser.pugx.org/limenet/laravel-datetime-attributes/license)](https://packagist.org/packages/limenet/laravel-datetime-attributes)
[![Total Downloads](https://poser.pugx.org/limenet/laravel-datetime-attributes/downloads)](https://packagist.org/packages/limenet/laravel-datetime-attributes)
[![StyleCI](https://styleci.io/repos/90111357/shield)](https://styleci.io/repos/90111357)
[![codecov](https://codecov.io/gh/limenet/laravel-datetime-attributes/branch/master/graph/badge.svg)](https://codecov.io/gh/limenet/laravel-datetime-attributes)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/36c8c6ea80ab4186b43d863b1be473d2)](https://www.codacy.com/app/limenet/laravel-datetime-attributes?utm_source=github.com&utm_medium=referral&utm_content=limenet/laravel-datetime-attributes&utm_campaign=badger)
[![Code Climate](https://codeclimate.com/github/limenet/laravel-datetime-attributes/badges/gpa.svg)](https://codeclimate.com/github/limenet/laravel-datetime-attributes)
[![Issue Count](https://codeclimate.com/github/limenet/laravel-datetime-attributes/badges/issue_count.svg)](https://codeclimate.com/github/limenet/laravel-datetime-attributes)

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
