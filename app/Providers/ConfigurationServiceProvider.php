<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\src\Contracts\Configuration;

class ConfigServiceProvider extends ServiceProvider
{


    public function boot()
    {
        $this->app->resolving(Configuration::class, function ($config, $app) {
        });
    }
}
