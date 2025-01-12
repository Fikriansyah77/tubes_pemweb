<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(airlineRepositoryInterface::class, airlineRepository::class);
        $this->app->bind(airportRepositoryInterface::class, airportRepository::class);
        $this->app->bind(flightRepositoryInterface::class, flightRepository::class);
        $this->app->bind(transactionRepositoryInterface::class, transactionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
