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
    | Either set the path to the credentials.json file or the contents of the file.
    | If you set the path, make sure you use the full path, e.g. storage_path('app/analytics/google-credentials.json')
    |
    */
    'credentials' => env('GOOGLE_ANALYTICS_CREDENTIALS', null),
];
