<?php

namespace App\Providers\SubCategory;

use Illuminate\Support\ServiceProvider;
use App\Repositories\SubCategoryRepository;
use App\Repositories\SubCategoryRepositoryInterface;

use App\Services\SubCategoryService;
use App\Services\SubCategoryServiceInterface;

class SubCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            SubCategoryServiceInterface::class,
            SubCategoryService::class
        );

        $this->app->bind(
           SubCategoryRepositoryInterface::class,
            SubCategoryRepository::class
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
