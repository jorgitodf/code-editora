<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\CodeEduBook\Repositories\BookRepository::class, \CodeEduBook\Repositories\BookRepositoryEloquent::class);
        $this->app->bind(\CodeEduBook\Repositories\CategoryRepository::class, \CodeEduBook\Repositories\CategoryRepositoryEloquent::class);
        $this->app->bind(\CodeEduUser\Repositories\UserRepository::class, \CodeEduUser\Repositories\UserRepositoryEloquent::class);
        //:end-bindings:
    }
}
