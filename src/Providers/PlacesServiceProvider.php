<?php namespace Mrjonleek\GoogleApi\Providers;

use Mrjonleek\GoogleApi\Services\PlacesApi;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class PlacesServiceProvider extends BaseServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('PlacesApi', function ($app) {
          $key = isset($app['config']['google.auth.key']) ? $app['config']['google.auth.key'] : null;

          return new PlacesApi($key);
        });
    }

    /**
     * Boot
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/google.php' => config_path('google.php')]);
    }
}
