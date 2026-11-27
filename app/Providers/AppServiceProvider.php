<?php

namespace App\Providers;

use App\Contracts\Interfaces\AttributeOptionsRepository;
use App\Contracts\Interfaces\AttributeRepository;
use App\Contracts\Interfaces\CategoryRepository;
use App\Contracts\Interfaces\HeroRepository;
use App\Contracts\Interfaces\ProductRepository;
use App\Repository\AttributeOptionsRepositoryImp;
use App\Repository\AttributeRepositoryImp;
use App\Repository\CategoryRepositoryImp;
use App\Repository\HeroRepositoryImp;
use App\Repository\ProductRepositoryImp;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CategoryRepository::class,
            CategoryRepositoryImp::class
        );
        $this->app->bind(
            AttributeRepository::class,
            AttributeRepositoryImp::class
        );
        $this->app->bind(
            AttributeOptionsRepository::class,
            AttributeOptionsRepositoryImp::class
        );
        $this->app->bind(
            ProductRepository::class,
            ProductRepositoryImp::class
        );
        $this->app->bind(
            HeroRepository::class,
            HeroRepositoryImp::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
