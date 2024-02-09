<?php

namespace AlexGithub987\sekadatacheck;

use Illuminate\Support\ServiceProvider;

class CikkServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'alexgithub987');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'alexgithub987');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/cikk.php', 'cikk');

        // Register the service the package provides.
        $this->app->singleton('cikk', function ($app) {
            return new Cikk;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['cikk'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/cikk.php' => config_path('cikk.php'),
        ], 'cikk.config');

    }
}
