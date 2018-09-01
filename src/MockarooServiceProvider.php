<?php

namespace Midnite81\LaravelMockaroo;

use Illuminate\Support\ServiceProvider;

class MockarooServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/mockaroo.php' => config_path('mockaroo.php')
        ]);

        $this->loadMigrations();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/mockaroo.php', 'mockaroo');
    }

    /**
     * Load the migrations
     */
    protected function loadMigrations()
    {
        if (method_exists($this, 'loadMigrationsFrom')) {
            $this->loadMigrationsFrom(__DIR__ . '/src/database/migrations');
        } else {
            $this->publishes([
                __DIR__ . '/src/database/migrations' => database_path('migrations')
            ], 'migrations');
        }

    }
}