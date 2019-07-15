<?php

namespace packages\LastWish\Infrastructure\Provider;

use Illuminate\Support\ServiceProvider;
use packages\LastWish\Domain\Model\User\UserRepositoryInterface;
use packages\LastWish\Infrastructure\Domain\Model\User\Eloquent\UserRepository;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
