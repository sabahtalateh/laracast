<?php

namespace App\Providers;

use Barr;
use Bazz;
use Fooo;
use Illuminate\Support\ServiceProvider;

class FooServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Fooo', function () {
            return new Fooo(new Barr(), new Bazz());
        });
    }
}
