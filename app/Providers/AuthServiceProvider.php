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
use Illuminate\Auth\TokenGuard;

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


    /**
     * Cookies rules
     * @link https://developer.mozilla.org/en-US/docs/Web/API/Document/cookie
     *
     * @var array
     */
    protected $rules;


    public function register()
    {
    }

    /**
     * Custom authentication boot
     *
     * @return void
     */
    public function boot()
    {
        $this->app->resolve(App::class, function (App $app) {
            $authManager = new AuthManager($app);
            $httpClient = new HttpClient()


           new TokenGuard();

            (new AuthManager($app))
                ->setDefaultDriver($driver)
                ->setProvider()

        });
    }

    protected function getCookie(SessionGuard $guard)
    {
        if ($this->environment('local')) {
            return $this->localCookie();
        }

        $guard->getCookieJar()->getQueuedCookies();
    }

    protected function localCookie()
    {
        $rawCookie = config('auth.localCookie');
        $cookie = Cookie::make();
    }
}
