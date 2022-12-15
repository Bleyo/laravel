<?php

use Illuminate\Support\Facades\App;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    | This option controls used authentication "guard", find
    |
    */


    'defaults' => [
        'guard' => App::environment(),
        'provider' => 'mindaweb-user'
    ],


    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    | This option defines a guard's configuration for a given environment
    |
    */


    'guards' => [
        'production' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'local' => [
            'driver' => 'cookie'
        ]
    ],


    'providers' => [
        'mindaweb-user' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
    ],

    'provider' => 'http://auth.pictet.com/',

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
