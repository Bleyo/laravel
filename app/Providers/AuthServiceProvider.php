<?php

namespace App\Providers;

use \Illuminate\Foundation\Application as App;
use UserResolver;
use Psy\Readline\Hoa\EventListener;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Session\SessionServiceProvider;
use Illuminate\Http\Client\Response;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Events\Dispatcher;
use Illuminate\Contracts\Session\Session;
use Illuminate\Auth\SessionGuard;

use Illuminate\Auth\GenericUser;
use Illuminate\Auth\AuthManager;
use GuzzleHttp\Psr7\HttpFactory;
use App\src\Services\HttpProvider;
use App\src\Services\HttpClient;
use App\src\Contracts\HttpProvider as ContractsHttpProvider;

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
     * Registering customised auth servie, requires ldap
     *
     * @return void
     */
    public function boot()
    {
        $this->app->resolve(App::class, function (App $app) {
            $authManager = new AuthManager($app);
            $sessionDriver = $authManager
                ->createSessionDriver('mw-session', config('session'));

            $authManager->resolveUsersUsing(function (UserResolver $resolver) {
                return n

            });
        });
    }


    protected function getCokies(SessionGuard $guard)
    {
        if (App::environment('local')) {
            return $guard->getCookieJar()->make('PPAUTH', )
        }
        $guard->getCookieJar()->getQueuedCookies();
    }


    /**
     *  $this->app->resolving(SessionGuard::class, function (SessionGuard $guard, $app) {
            $request = $guard->getRequest();
            $request->setSession()
        });

        $this->app->singleton(Mindaweb::class, function (AuthManager $auth) {
            $sessionGuard = $auth->createSessionDriver('mw-session', config('session'));
        });


        $cookies = $auth->createSessionDriver('mw-session', config('session'));


        $auth->resolveUsersUsing(function (HttpProvider $provider) {
            return $provider->resolve(['uid' => $name]);
        })->createSessionDriver('mw-session', config('session'))->setDispatcher(function (Dispatcher $dispatch) {
            $dispatch->dispatch();
        })

     *
     * @return void
     */
    protected function getResolver()
    {
    }
}
