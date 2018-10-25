<?php

namespace Uccello\ModuleSkeleton\Providers;

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
    $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'module-skeleton');

    // Translations
    $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'module-skeleton');

    // Migrations
    $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

    // Publish assets
    $this->publishes([
      __DIR__ . '/../../public' => public_path('vendor/uccello/module-skeleton'),
    ], 'assets'); // CSS
  }

  public function register()
  {

  }
}