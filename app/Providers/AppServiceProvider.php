<?php

namespace App\Providers;

use App\Repositories\RepositoryClasses\BankRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RepositoryIntefaces\CategoryInterface;
use App\Repositories\RepositoryClasses\CategoryRepository;
use App\Repositories\RepositoryClasses\SubCategoryRepository;
use App\Repositories\RepositoryIntefaces\BrandInterface;
use App\Repositories\RepositoryClasses\BrandRepository;
use App\Repositories\RepositoryIntefaces\BankInterface;
use App\Repositories\RepositoryIntefaces\SubCategoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class,CategoryRepository::class);
        $this->app->bind(BrandInterface::class,BrandRepository::class);
        $this->app->bind(SubCategoryInterface::class,SubCategoryRepository::class);
        $this->app->bind(BankInterface::class,BankRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
