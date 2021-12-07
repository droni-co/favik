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
      // dd('hola mundo');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      include __DIR__.'/routes.php';
    }
}
