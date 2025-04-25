<?php

namespace App\Providers;

use App\Interfaces\Services\ProductServiceInterface;
use App\Interfaces\Services\ServiceInterface;
use App\Interfaces\Services\UserServiceInterface;
use App\Services\BaseService;
use App\Services\ProductService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ServiceInterface::class, BaseService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //    
    }
}
