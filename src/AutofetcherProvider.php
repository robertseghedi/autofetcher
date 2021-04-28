<?php

namespace RobertSeghedi\Autofetcher;

use Illuminate\Support\ServiceProvider;

class AutofetcherProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('RobertSeghedi\Autofetcher\AutofetchController');
        $this->app->make('RobertSeghedi\Autofetcher\Models\Autofetch');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }
}
