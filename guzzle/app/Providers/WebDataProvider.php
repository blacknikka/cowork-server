<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class WebDataProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // store
        $this->app->bind(
            \App\DataProvider\WebData\WebDataProviderInterface::class,
            \App\DataProvider\WebData\WebDataProvider::class
        );
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
