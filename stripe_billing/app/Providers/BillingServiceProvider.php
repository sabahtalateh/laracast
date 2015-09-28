<?php

namespace App\Providers;

use App\Billing\BillingInterface;
use App\Billing\StripeBilling;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BillingServiceProvider extends ServiceProvider
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
        App::bind(BillingInterface::class, StripeBilling::class);
    }
}
