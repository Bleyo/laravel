<?php

namespace App\Providers;

use Psr\Http\Message\RequestInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Request as HttpClient;
use App\src\Services\GeneratedUser;
use App\src\Services\FakeAuthentication;
use App\src\Services\AuthProvider;
use App\src\Contracts\UserProvider;

class BroadcastServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->app->scoped(Authenticati::class, function ($app) {
            $app->resolving(Request::class, function ($request, $app) {
                $app->environment('local')
                    ? $app->bind(RequestInterface::class, HttpRequest::class)
                    : $app->bind(RequestInterface::class, Request::class);
            });
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require base_path('routes/channels.php');
    }
}
