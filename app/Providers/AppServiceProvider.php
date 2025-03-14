<?php

namespace App\Providers;

use App\Interfaces\RecipeRepositoryInterface;
use App\Repositories\RecipeRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RecipeRepositoryInterface::class, RecipeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
