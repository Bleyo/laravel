<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Database\Eloquent\Model;

class ResourceServiceProvider extends ServiceProvider
{


    public function register()
    {
        $this->registerSafeguards();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    protected function registerSafeguards()
    {
        $state = !$this->app->isProduction();

        Model::preventLazyLoading($state);
        Model::preventSilentlyDiscardingAttributes($state);
        Model::preventAccessingMissingAttributes($state);
        Model::shouldBeStrict($state);
    }
}
