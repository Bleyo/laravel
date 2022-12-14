<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{


    private array $providers = [
        AuthServiceProvider::class,
        EventServiceProvider::class,
        HttpServiceProvider::class,
        RouteServiceProvider::class,
        EventServiceProvider::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->registerConfiguredProviders($this->providers);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
