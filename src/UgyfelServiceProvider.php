<?php

namespace AlexGithub987\sekadatacheck;

use Illuminate\Support\ServiceProvider;

class UgyfelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
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
        $this->mergeConfigFrom(__DIR__.'/../config/ugyfel.php', 'ugyfel');

        // Register the service the package provides.
        $this->app->singleton('ugyfel', function ($app) {
            return new Ugyfel;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['ugyfel'];
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
            __DIR__.'/../config/ugyfel.php' => config_path('ugyfel.php'),
        ], 'ugyfel.config');

    }
}
