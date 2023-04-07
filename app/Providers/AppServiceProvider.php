<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\InternetServiceProviderInterface;
use App\Services\MptServiceProvider;
use App\Services\OoredooServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InternetServiceProviderInterface::class, MptServiceProvider::class);
        $this->app->bind(InternetServiceProviderInterface::class, OoredooServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
