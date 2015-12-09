<?php

namespace Hilabs\Gravatar;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class GravatarServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerHelpers();
    }

    /**
     * Register the helpers file.
     */
    public function registerHelpers()
    {
        require __DIR__.'/helpers.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('gravatar', function($app) {
            return new Gravatar;
        });
        //$loader = AliasLoader::getInstance();
        //$loader->alias('Gravatar', 'Hilabs\Gravatar\Facades\Gravatar');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return ['gravatar'];
    }

}
