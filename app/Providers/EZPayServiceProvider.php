<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EZPayServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('hashkey', config('HashKey'));
        $this->app->bind('hashiv', config('HashIV'));
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
