<?php

namespace App\Accounts;

use App\Accounts\Providers\GitHub;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(\App\Accounts\Providers\Contracts\Provider::class, function ($app) {
            return new GitHub($app['redirect'], new Client, env('GITHUB_CLIENT_ID'), env('GITHUB_CLIENT_SECRET'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
