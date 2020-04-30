<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\EstadoRepository::class, \App\Repositories\EstadoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CidadeRepository::class, \App\Repositories\CidadeRepositoryEloquent::class);
        //:end-bindings:
    }
}
