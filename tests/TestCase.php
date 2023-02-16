<?php

namespace Limenet\LaravelDatetimeAttributes\Tests;

use Limenet\LaravelDatetimeAttributes\LaravelDatetimeAttributesServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelDatetimeAttributesServiceProvider::class,
        ];
    }
}
