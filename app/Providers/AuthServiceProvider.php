<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\src\Services\Authentication;
use App\src\Contracts\HttpProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function register()
    {
        // provider => (RequestInterface, )

        $this->app->scoped(Authentication::class, function ($app) {
            $app->resolving(ServerRequestInterface::class, function ($request, $app) {
                $provider = $app->make(HttpProvider::class)

                $response = Http::recorded(function (Request $request, Response $response) {
                });
            });
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
