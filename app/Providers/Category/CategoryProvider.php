<?php

namespace App\Providers\Category;

use Illuminate\Support\ServiceProvider;
use App\Services\CategoryService;
use App\Services\CategoryServiceInterface;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;

class CategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CategoryServiceInterface::class,
            CategoryService::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
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
