<?php

namespace App\Providers\Product;

use App\Repositories\ProductRepositoriesInterface;

use Illuminate\Support\ServiceProvider;

use App\Repositories\ProductRepositories;


use App\Services\ProductServices;
use App\Services\ProductServicesInterface;

class ProductProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       $this->app->bind(
       ProductServicesInterface::class,
          ProductServices::class,
       );

       $this->app->bind(
            ProductRepositoriesInterface::class,
            ProductRepositories::class,
       );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
