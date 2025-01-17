<?php

namespace brianllevado123\BWZohoGuard;

use Illuminate\Support\ServiceProvider;

class BWZohoGuardServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bitwarden.php', 'bitwarden'
        );
    }

    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the middleware
        $this->app['router']->aliasMiddleware('validate.api.key', \brianllevado123\BWZohoGuard\Http\Middleware\ValidateRequestHeaderAPIKey::class);

        // Optionally, publish the config file to the user's app
        $this->publishes([
            __DIR__.'/../config/bitwarden.php' => config_path('bitwarden.php'),
        ], 'config');

        // Load routes file (optional if you have custom routes)
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
    }
}
