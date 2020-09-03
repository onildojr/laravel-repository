<?php

namespace App\Providers;

use App\Http\Validators\Interfaces\IUserValidator;
use App\Http\Validators\UserValidator;
use App\Repositories\Interfaces\IEloquentRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\BaseRepository;
use App\Services\Interfaces\IUserService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

/**
* Class RepositoryServiceProvider
* @package App\Providers
*/
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserValidator::class, UserValidator::class);

        $this->app->bind(IUserService::class, UserService::class);

        $this->app->bind(IEloquentRepository::class, BaseRepository::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
