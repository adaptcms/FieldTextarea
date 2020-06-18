<?php

namespace Adaptcms\FieldTextarea;

use Illuminate\Support\ServiceProvider;

class FieldTextareaServiceProvider extends ServiceProvider
{
  /**
   * Perform post-registration booting of services.
   *
   * @return void
   */
  public function boot()
  {
    // Publishing is only necessary when using the CLI.
    if ($this->app->runningInConsole()) {
      $this->bootForConsole();
    }
  }

  /**
   * Register any package services.
   *
   * @return void
   */
  public function register()
  {
    $this->mergeConfigFrom(__DIR__.'/../config/fieldtextarea.php', 'fieldtextarea');

    // Register the service the package provides.
    $this->app->singleton('FieldTextarea', function ($app) {
      return new FieldTextarea;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return [
      'FieldTextarea'
    ];
  }

  /**
   * Console-specific booting.
   *
   * @return void
   */
  protected function bootForConsole()
  {
    // Collect vendor name, and package name.
    $vendorName = basename(realpath(__DIR__ . '/../../'));
    $packageName = basename(realpath(__DIR__ . '/../'));

    // Publishing the configuration file.
    $this->publishes([
        __DIR__.'/../config/fieldtextarea.php' => config_path('fieldtextarea.php'),
    ], 'fieldtextarea.config');

    // Register package commands.
    $commands = [];
    foreach (glob(__DIR__ . '/Console/Commands/*.php') as $row) {
      // init class path
      $classPath = '\\' . $vendorName . '\\' . $packageName . '\\Console\\Commands\\';

      // class path with command file class name
      $commandFileClass = str_replace('.php', '', basename($row));

      $classPath .= $commandFileClass;

      $commands[] = $classPath;
    }

    $this->commands($commands);
  }
}
