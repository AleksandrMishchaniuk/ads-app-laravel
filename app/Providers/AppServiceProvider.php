<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\EloquentUserRepository;
use App\Factories\Interfaces\UserFactoryInterface;
use App\Factories\EloquentUserFactory;
use App\Models\User;
use App\Repositories\Interfaces\AdRepositoryInterface;
use App\Repositories\EloquentAdRepository;
use App\Factories\Interfaces\AdFactoryInterface;
use App\Factories\EloquentAdFactory;
use App\Models\Ad;
use App\Factories\Interfaces\PaginatorFactoryInterface;
use App\Factories\PaginatorFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserRepositoryInterface::class, function ($app) {
            return new EloquentUserRepository($app[User::class]);
        });

        $this->app->singleton(UserFactoryInterface::class, function ($app) {
            return new EloquentUserFactory;
        });

        $this->app->singleton(AdRepositoryInterface::class, function ($app) {
            return new EloquentAdRepository($app[Ad::class]);
        });

        $this->app->singleton(AdFactoryInterface::class, function ($app) {
            return new EloquentAdFactory;
        });

        $this->app->singleton(PaginatorFactoryInterface::class, function ($app) {
            return new PaginatorFactory;
        });
    }
}
