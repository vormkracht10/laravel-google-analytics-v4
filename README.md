# Laravel Google Analytics

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vormkracht10/laravel-google-analytics.svg?style=flat-square)](https://packagist.org/packages/vormkracht10/laravel-google-analytics)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/vormkracht10/laravel-google-analytics/run-tests?label=tests)](https://github.com/vormkracht10/laravel-google-analytics/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/vormkracht10/laravel-google-analytics/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/vormkracht10/laravel-google-analytics/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/vormkracht10/laravel-google-analytics.svg?style=flat-square)](https://packagist.org/packages/vormkracht10/laravel-google-analytics)

## About Laravel Google Analytics
Laravel Google Analytics is a Laravel package that allows you to easily integrate Google Analytics v4 into your Laravel application. With this package, you can track pageviews, events, ecommerce transactions, and more, all with the latest version of Google Analytics.


## Installation

You can install the package via composer:

```bash
composer require vormkracht10/laravel-google-analytics
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-google-analytics-config"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Google Analytics ID
    |--------------------------------------------------------------------------
    |
    | The Google Analytics ID of the website you want to track.
    |
    */
    'property_id' => env('GOOGLE_ANALYTICS_PROPERTY_ID', null),

    /*
    |--------------------------------------------------------------------------
    | Google Analytics Client Secret
    |--------------------------------------------------------------------------
    |
    | The Google Analytics Client Secret of the website you want to track.
    |
    */
    'credentials' => env('GOOGLE_ANALYTICS_CREDENTIALS', storage_path('app/analytics/google-credentials.json')),
];
```

## Usage
First you need to create a service account in the Google Cloud Console. You can find the instructions here: https://developers.google.com/analytics/devguides/reporting/core/v4/quickstart/service-php. 

After you have created the service account, you need to download the credentials and save them in the `storage/app/analytics` folder. You can change the location of the credentials in the config file if you want.

After you have done this, you can use the package like this:

```php
use Vormkracht10\Analytics\Facades\Analytics;
use Vormkracht10\Analytics\Period;

// Get the average session duration for the last 7 days:
$averageSessionDuration = Analytics::averageSessionDuration(Period::days(7));
```

### Available periods
```php
// Set the period to the last x days:
Period::days(1);

// Set the period to the last x weeks:
Period::weeks(2);

// Set the period to the last x months:
Period::months(3);

// Set the period to the last x years:
Period::years(4);
```

## Available methods

### Average session duration
```php
// Get the average session duration for the last 7 days:
$data = Analytics::averageSessionDuration(Period::days(7));

// Get the average session duration for the last 7 days, grouped by date:
$data = Analytics::averageSessionDurationByDate(Period::days(7));
```

### Total pageviews
```php
// Get the total pageviews for the last 14 days:
$data = Analytics::getTotalViews(Period::days(14));

// Get the total pageviews for the last 14 days, grouped by date:
$data = Analytics::getTotalViewsByDate(Period::days(14));

// Get the total pageviews for the last 14 days, grouped by page:
$data = Analytics::getTotalViewsByPage(Period::days(14));

// Get the most viewed pages for the last 14 days:
$data = Analytics::getMostViewsByPage(Period::days(14));

// Get the least viewed pages for the last 14 days:
$data = Analytics::getLeastViewsByPage(Period::days(14));
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Bas van Dinther](https://github.com/vormkracht10)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
