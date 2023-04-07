<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\InternetServiceProviderInterface;
use App\Services\OperatorServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InternetServiceProviderInterface::class, OperatorServiceProvider::class);
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
