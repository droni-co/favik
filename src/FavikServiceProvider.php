<?php

namespace Favik\Favik;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Favik\Favik\Http\Middleware\FavikApi;

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
    $router = $this->app->make(Router::class);
    $router->aliasMiddleware('favik-api', FavikApi::class);
    $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    include __DIR__.'/routes.php';
  }
}