<?php

namespace Favik\Favik;

use Illuminate\Support\ServiceProvider;

class FavikServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->mergeConfigFrom(__DIR__.'/config/config.php', 'favik');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
      include __DIR__.'/routes.php';
    }
}
