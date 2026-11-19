<?php

namespace App\Providers;

use App\Contracts\Interfaces\AttributeRepository;
use App\Contracts\Interfaces\CategoryRepository;
use App\Repository\AttributeRepositoryImp;
use App\Repository\CategoryRepositoryImp;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
