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
      $res = $this->mergeConfigFrom(__DIR__.'/config/database.php', 'database.connections');
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
