<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RepositoryIntefaces\CategoryInterface;
use App\Repositories\RepositoryClasses\CategoryRepository;
use App\Repositories\RepositoryIntefaces\BrandInterface;
use App\Repositories\RepositoryClasses\BrandRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
        $this->app->bind(BrandInterface::class,BrandRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
