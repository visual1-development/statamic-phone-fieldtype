<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Primary Country Code
    |--------------------------------------------------------------------------
    |
    | The primary country code to use for phone number validation.
    | This will be the first country tried when parsing phone numbers.
    | Use ISO 3166-1 alpha-2 country codes (e.g., 'AU', 'US', 'GB').
    |
    */
    'primary_country' => env('PHONE_FIELDTYPE_PRIMARY_COUNTRY', 'AU'),

    /*
    |--------------------------------------------------------------------------
    | Auto Fallback
    |--------------------------------------------------------------------------
    |
    | Enable automatic fallback detection if the phone number doesn't
    | match the primary country. When enabled, the system will attempt
    | to detect the country automatically if the primary country fails.
    |
    */
    'auto_fallback' => env('PHONE_FIELDTYPE_AUTO_FALLBACK', true),
];