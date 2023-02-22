<?php

namespace Vormkracht10\Analytics;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Vormkracht10\Analytics\Commands\AnalyticsCommand;

class AnalyticsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-google-analytics')
            ->hasConfigFile();

        if (app()->runningUnitTests()) {
            return; 
        }

        $package->hasInstallCommand(function (InstallCommand $command) {
            $command->publishConfigFile()
                ->askToStarRepoOnGitHub('vormkracht10/laravel-google-analytics');
        });
    }
}
