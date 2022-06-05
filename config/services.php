<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '258324599795-3dlufk4k9hne1ijneemrrja8jtvr7604.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/callback/google',
    ],

    'facebook' => [
        'client_id' => '748763629494362',
        'client_secret' => 'e64b521aff2713be6c4b6aff155847d1',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],

    'linkedin' => [
        'client_id' => '86vaigtul8w975',
        'client_secret' => 'vluvS5QGGmv5Ag1P',
        'redirect' => 'http://localhost:8000/callback/linkedin',
    ],

];
