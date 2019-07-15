<?php

namespace packages\LastWish\Application;

use Illuminate\Support\ServiceProvider;

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
