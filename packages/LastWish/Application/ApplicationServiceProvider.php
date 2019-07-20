<?php

namespace packages\LastWish\Application;

use Illuminate\Support\ServiceProvider;
// @todo: useがないとbindされずエラーになる。
use packages\LastWish\Application\SignInService;
use packages\LastWish\Application\SignInServiceInterface;
use packages\LastWish\Application\SignInValidationService;
use packages\LastWish\Application\SignInValidationServiceInterface;

class ApplicationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SignUpServiceInterface::class, SignUpService::class);
        $this->app->bind(SignUpValidationServiceInterFace::class, SignUpValidationService::class);
        $this->app->bind(SignInServiceInterFace::class, SignInService::class);
        $this->app->bind(SignInValidationServiceInterFace::class, SignInValidationService::class);
        $this->app->bind(AuthServiceInterface::class, AuthService::class);
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
