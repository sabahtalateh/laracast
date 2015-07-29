<?php

namespace App\Providers;

use App\Article;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeNavigation();
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

    public function composeNavigation()
    {
        view()->composer('partials.navbar', 'App\Http\Composers\NavigationComposer');
//        view()->composer('partials.navbar', function ($view) {
//            $view->with('latest', Article::latest()->first());
//        });
    }
}
