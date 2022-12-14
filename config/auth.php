<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    | This option controls the default authentication "guard"
    |
    */

    'defaults' => [
        'guard' => 'web'
    ],

    'guards' => [
        'http' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Technical Users
    |--------------------------------------------------------------------------
    | This option defines available users for sending mail & requestion ldap
    |
    */
    'users' => [
        'relm_tech' => 'password',
        '2764' => 'password',
    ]
];
