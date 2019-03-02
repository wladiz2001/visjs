<?php

namespace Wladiz2001\Visjs;

use Illuminate\Support\ServiceProvider;
use Wladiz2001\Visjs\Builder;

class VisjsServiceProvider extends ServiceProvider
{
	
	/**
     * Array with colours configuration of the chartjs config file
     * @var array
     */
    protected $colours = [];
	
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'wladiz2001');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'wladiz2001');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->loadViewsFrom(__DIR__.'/resources/views', 'vis-template');
        $this->colours = config('chartjs.colours');


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
        $this->mergeConfigFrom(__DIR__.'/../config/visjs.php', 'visjs');

        // Register the service the package provides.
        //$this->app->singleton('visjs', function ($app) {
        //    return new Visjs;
        //});
		
		$this->app->bind('visjs', function() {
            return new Builder();
        });
		
		
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['visjs'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/visjs.php' => config_path('visjs.php'),
        ], 'visjs.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/wladiz2001'),
        ], 'visjs.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/wladiz2001'),
        ], 'visjs.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/wladiz2001'),
        ], 'visjs.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
