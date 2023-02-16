<?php

namespace Limenet\LaravelDatetimeAttributes;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Limenet\LaravelDatetimeAttributes\Commands\LaravelDatetimeAttributesCommand;

class LaravelDatetimeAttributesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-datetime-attributes');
    }
}
