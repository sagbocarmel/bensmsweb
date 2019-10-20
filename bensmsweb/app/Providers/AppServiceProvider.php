<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Http\Repositories\RoleRepositoryInterface::class,
            \App\Http\Repositories\RoleRepository::class

        );

        $this->app->bind(
            \App\Http\Repositories\SMSRepositoryInterface::class,
            \App\Http\Repositories\SMSRepository::class

        );

        $this->app->bind(
            \App\Http\Repositories\UserRepositoryInterface::class,
            \App\Http\Repositories\UserRepository::class

        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
