<?php

namespace Uccello\PackageSkeleton\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * App Service Provider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        // Views
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'package-skeleton');

        // Translations
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'package-skeleton');

        // Migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        // Routes
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        // Publish assets
        $this->publishes([
            __DIR__ . '/../../public' => public_path('vendor/uccello/package-skeleton'),
        ], 'package-skeleton-assets');

        // Config
        // $this->publishes([
        //     __DIR__ . '/../../config/package-skeleton.php' => config_path('package-skeleton.php'),
        // ], 'package-skeleton-config');
    }

    public function register()
    {
        // Config
        // $this->mergeConfigFrom(
        //     __DIR__ . '/../../config/package-skeleton.php',
        //     'package-skeleton'
        // );
    }
}
