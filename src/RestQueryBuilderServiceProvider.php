<?php

namespace AleFerreiraNogueira\RestQueryBuilder;

use Illuminate\Support\ServiceProvider;

class RestQueryBuilderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
    }
    
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('RestQueryBuilder', function ($app) {
            return new RestQueryBuilder($app);
        });
    }
}
