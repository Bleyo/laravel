<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Filesystem\Filesystem as FilesystemFilesystem;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Cache\RateLimiting\Limit;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route of application
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/milestones';


    public function register()
    {
        $this->app->bind(Filesystem::class, function ($service, $app) {
            $app->make($service);
        });
    }
    /**
     * Defines routes model binds & global structure
     *
     * @return void
     */
    public function boot()
    {
        $this->basePath = app_path('Http\Routes');
        $this->configureRateLimiting();

        $this->routes(function (Filesystem $fs) {
            $routeFiles = $fs->allDirectories($this->basePath);

            foreach ($routeFiles as $directory) {
                $prefix = Str::lower(Str::remove('Routes.php', $directory));

                Route::middleware('web')->prefix($prefix)
                    ->group($directory);
            }
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
