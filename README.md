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

## Demographic Analytics

Methods to retrieve demographic analytics data for your website or application. You can use these methods to get information such as the most used languages, total users by city or country and total users per gender. All of the methods take a Period object as a parameter to specify the time range for the analytics data.

Here are some examples of how to use the methods:

```php
use Analytics\Period;
use Analytics\Analytics;

// Get the most users by language for the last 7 weeks, limit to top 10:
$data = Analytics::getMostUsersByLanguage(period: Period::weeks(7), limit: 10);

// Get the total users by language for the last 7 weeks:
$data = Analytics::getTotalUsersByLanguage(Period::weeks(7));

// Get the most users by city for the last 7 weeks, limit to top 5:
$data = Analytics::getMostUsersByCity(period: Period::weeks(7), limit: 5);

// Get the total users by city for the last 7 weeks:
$data = Analytics::getTotalUsersByCity(Period::weeks(7));

// Get the most users by country for the last 7 weeks, limit to top 10:
$data = Analytics::getMostUsersByCountry(period: Period::weeks(7), limit: 10);

// Get the total users by country for the last 7 weeks:
$data = Analytics::getTotalUsersByCountry(Period::weeks(7));

// Get the total users by gender for the last 7 weeks:
$data = Analytics::getTotalUsersByGender(Period::weeks(7));

// Get the total users by age group for the last 7 weeks
$data = Analytics::getTotalUsersByAgeGroup(Period::weeks(7));
```

### Device and OS Analytics

Methods to retrieve device and operating system analytics data for your website or application. You can use these methods to get information such as the most popular browsers, screen resolutions, and mobile devices used by your visitors. All of the methods take a Period object as a parameter to specify the time range for the analytics data.

Here are some examples of how to use the methods:

```php
use Analytics\Period;
use Analytics\Analytics;

// Get the most users by device category for the last 1 year:
$data = Analytics::getMostUsersByDeviceCategory(Period::years(1));

// Get the most users by operating system for the last 1 year:
$data = Analytics::getMostUsersByOperatingSystem(Period::years(1));

// Get the most users by browser for the last 1 year, limit to top 10:
$data = Analytics::getMostUsersByBrowser(period: Period::years(1), limit: 10);

// Get the total users by browser for the last 1 year:
$data = Analytics::getTotalUsersByBrowser(Period::years(1));

// Get the most users by screen resolution for the last 1 year, limit to top 5:
$data = Analytics::getMostUsersByScreenResolution(period: Period::years(1), limit: 5);

// Get the total users by operating system for the last 1 year:
$data = Analytics::getTotalUsersByOperatingSystem(Period::years(1));

// Get the total users by device category for the last 1 year:
$data = Analytics::getTotalUsersByDeviceCategory(Period::years(1));

// Get the most users by mobile device branding for the last 1 year, limit to top 10:
$data = Analytics::getMostUsersByMobileDeviceBranding(period: Period::years(1), limit: 10);

// Get the total users by mobile device branding for the last 1 year:
$data = Analytics::getTotalUsersByMobileDeviceBranding(Period::years(1));

// Get the most users by mobile device model for the last 1 year, limit to top 10:
$data = Analytics::getMostUsersByMobileDeviceModel(period: Period::years(1), limit: 10);

// Get the total users by mobile device model for the last 1 year:
$data = Analytics::getTotalUsersByMobileDeviceModel(Period::years(1));

// Get the most users by mobile input selector for the last 1 year, limit to top 10:
$data = Analytics::getMostUsersByMobileInputSelector(period: Period::years(1), limit: 10);

// Get the total users by mobile input selector for the last 1 year:
$data = Analytics::getTotalUsersByMobileInputSelector(Period::years(1));

// Get the most users by mobile device info for the last 1 year, limit to top 10:
$data = Analytics::getMostUsersByMobileDeviceInfo(period: Period::years(1), limit: 10);

// Get the total users by mobile device info for the last 1 year:
$data = Analytics::getTotalUsersByMobileDeviceInfo(Period::years(1));

// Get the most users by mobile device marketing name for the last 1 year, limit to top 10:
$data = Analytics::getMostUsersByMobileDeviceMarketingName(period: Period::years(1), limit: 10);

// Get the total users by mobile device marketing name for the last 1 year:
$data = Analytics::getTotalUsersByMobileDeviceMarketingName(Period::years(1));
```

### Pageviews Analytics

Methods to retrieve pageview analytics data for your website or application. You can use these methods to get information such as the total views or by page from your visitors. All of the methods take a Period object as a parameter to specify the time range for the analytics data.

Here are some examples of how to use the methods:

```php
use Analytics\Period;
use Analytics\Analytics;

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

### Sessions Analytics

Methods to retrieve session duration analytics data for your website or application. You can use these methods to get information such as the average session time from your visitors. All of the methods take a Period object as a parameter to specify the time range for the analytics data.

Here are some examples of how to use the methods:

```php
use Analytics\Period;
use Analytics\Analytics;

// Get the average session duration for the last 7 days:
$data = Analytics::averageSessionDuration(Period::days(7));

// Get the average session duration for the last 7 days, grouped by date:
$data = Analytics::averageSessionDurationByDate(Period::days(7));
```

### Users Analytics

Methods to retrieve user analytics data for your website or application. You can use these methods to get information such as the total visitors. All of the methods take a Period object as a parameter to specify the time range for the analytics data.

Here are some examples of how to use the methods:

```php
use Analytics\Period;
use Analytics\Analytics;

// Get the total users for the last 5 weeks:
$data = Analytics::getTotalUsers(Period::weeks(5));
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

-   [Bas van Dinther](https://github.com/vormkracht10)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
