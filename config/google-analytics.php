<?php

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
