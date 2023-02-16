<?php

namespace Limenet\LaravelDatetimeAttributes\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Limenet\LaravelDatetimeAttributes\LaravelDatetimeAttributesServiceProvider;

class TestCase extends Orchestra
{

    protected function getPackageProviders($app)
    {
        return [
            LaravelDatetimeAttributesServiceProvider::class,
        ];
    }
}
