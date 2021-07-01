<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repository\EloquentRepositoryInterface;
use App\Repository\VehicleRepositoryInterface;
use App\Repository\BaseRepository;
use App\Repository\VehicleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        // $this->app->bind(VehicleRepositoryInterface::class, VehicleRepository::class);
    }
}
