<?php

namespace Vormkracht10\Analytics;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vormkracht10\Analytics\Commands\AnalyticsCommand;

class AnalyticsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-google-analytics')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-google-analytics_table')
            ->hasCommand(AnalyticsCommand::class);
    }
}
