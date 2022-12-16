<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\src\Services\HttpClient;

class BroadcastServiceProvider extends ServiceProvider
{


    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->resolving(HttpClient::class, function ($client, $app) {
        });
    }
}
