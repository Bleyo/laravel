<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\src\Contracts\HttpProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    public function register()
    {
    }

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->scoped(HttpProvider::class, function ($service, $app) {
            $app->when($service::class)->needs(Response::class)
                ->give(Http::response('"{user}"', 200, []));
        });

        $this->registerPolicies();
    }
}
