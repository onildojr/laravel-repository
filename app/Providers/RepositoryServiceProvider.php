<?php

namespace App\Providers;

use App\Http\Validators\AlbumValidator;
use App\Http\Validators\ArtistValidator;
use App\Http\Validators\Interfaces\IAlbumValidator;
use App\Http\Validators\Interfaces\IArtistValidator;
use App\Http\Validators\Interfaces\ITrackValidator;
use App\Http\Validators\Interfaces\IUserValidator;
use App\Http\Validators\TrackValidator;
use App\Http\Validators\UserValidator;
use App\Repositories\Eloquent\AlbumRepository;
use App\Repositories\Eloquent\ArtistRepository;
use App\Repositories\Interfaces\IEloquentRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\TrackRepository;
use App\Repositories\Interfaces\IAlbumRepository;
use App\Repositories\Interfaces\IArtistRepository;
use App\Repositories\Interfaces\ITrackRepository;
use App\Services\AlbumService;
use App\Services\ArtistService;
use App\Services\Interfaces\IAlbumService;
use App\Services\Interfaces\IArtistService;
use App\Services\Interfaces\ITrackService;
use App\Services\Interfaces\IUserService;
use App\Services\TrackService;
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
        $this->app->bind(IAlbumValidator::class, AlbumValidator::class);
        $this->app->bind(IArtistValidator::class, ArtistValidator::class);
        $this->app->bind(ITrackValidator::class, TrackValidator::class);

        $this->app->bind(IAlbumService::class, AlbumService::class);
        $this->app->bind(IArtistService::class, ArtistService::class);
        $this->app->bind(ITrackService::class, TrackService::class);
        $this->app->bind(IUserService::class, UserService::class);

        $this->app->bind(IEloquentRepository::class, BaseRepository::class);
        $this->app->bind(IAlbumRepository::class, AlbumRepository::class);
        $this->app->bind(IArtistRepository::class, ArtistRepository::class);
        $this->app->bind(ITrackRepository::class, TrackRepository::class);
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
