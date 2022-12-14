<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use HttpProvider;
use App\src\Contracts\HttpProvider as ContractsHttpProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(HttpProvider::class, function ($app) {
            return new Transistor($app->make(PodcastParser::class));
        });
    }
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        //
    }
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
