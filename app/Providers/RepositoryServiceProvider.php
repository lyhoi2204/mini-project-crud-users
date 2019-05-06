<?php

namespace App\Providers;

use App\Repositories\Production\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $repositories = [
        UserRepositoryInterface::class => UserRepository::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $class) {
            $this->app->singleton($interface, $class);
        }
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
