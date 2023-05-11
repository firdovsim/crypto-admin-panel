<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Binance authentication
    |--------------------------------------------------------------------------
    |
    | Authentication key and secret for Binance API.
    |
     */

    'auth' => [
        'key'        => env('BINANCE_KEY', 'y82Smpz8VwcbO8pE8OaCvBgioeZHxUmOZmIOKsxolYIbk9CAyiyvIPdsHmPVQcpN'),
        'secret'     => env('BINANCE_SECRET', '9ojcct8nnjdPg4cBKlh7lwZ2eAkXAM18t8ucDXE9Qxyp3sjTl7aAjaO9fGZ7Igup'),
    ],

    /*
    |--------------------------------------------------------------------------
    | API URLs
    |--------------------------------------------------------------------------
    |
    | Binance API endpoints
    |
     */

    'urls' => [
        'api'   => 'https://api.binance.com/api/',
        'sapi'  => 'https://api.binance.com/sapi/',
        'fapi' => 'https://fapi.binance.com/fapi/'
    ],

    /*
    |--------------------------------------------------------------------------
    | API Settings
    |--------------------------------------------------------------------------
    |
    | Binance API settings
    |
     */

    'settings' => [
        'timing' => env('BINANCE_TIMING', 5000),
    ],

];
