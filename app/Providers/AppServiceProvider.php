<?php

namespace App\Providers;

use App\Repositories\CurrencyService;
use App\Repositories\CurrencyServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            CurrencyServiceInterface::class,
            CurrencyService::class
        );
    }
}
