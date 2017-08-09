<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\EloquentUserRepository;
use App\Factories\Interfaces\UserFactoryInterface;
use App\Factories\EloquentUserFactory;
use App\Models\User;

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
    }
}
