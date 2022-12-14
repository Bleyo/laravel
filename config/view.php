<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    | paths that should be checked for your views
    |
    */

    'paths' => [
        resource_path('Templates'),
        resource_path('pages')
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Used for application maintenance to render
    | last saved state.
    |
    */

    'compiled' => realpath(storage_path('framework/views'))

];
