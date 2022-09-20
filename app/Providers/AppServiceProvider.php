<?php

namespace App\Providers;

use App\Menu;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
       if (env('REDIRECT_HTTPS')) {
           $url->formatScheme('https://');
       }

       view()->composer('layouts.menu', function($view) {
        $view->with('menus', Menu::menus());
    });
    }

}
