<?php namespace Pjeutr\LaravelVisJs\Providers;

use Illuminate\Support\ServiceProvider;

class VisjsServiceProvider extends ServiceProvider
{

    /**
     * Array with colours configuration of the chartjs config file
     * @var array
     */
    //protected $colours = [];

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'vis-template');
      //  $this->colours = config('chartjs.colours');
    }


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('visjs', function() {
            return new Builder();
        });
    }
}
