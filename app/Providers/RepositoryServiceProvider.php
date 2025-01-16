<?php

namespace App\Providers;

use App\Interfaces\airlineRepositoryInterface;
use App\Interfaces\airportRepositoryInterface;
use App\Interfaces\flightRepositoryInterface;
use App\Interfaces\transactionRepositoryInterface;
use App\Repositories\airlineRepository;
use App\Repositories\airportRepository;
use App\Repositories\flightRepository;
use App\Repositories\transactionRepository;
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
