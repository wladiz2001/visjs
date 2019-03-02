<?php namespace Pjeutr\LaravelVisJs\Providers;

use Pjeutr\LaravelVisJs\Builder;
use Pjeutr\LaravelVisJs\ChartBar;
use Pjeutr\LaravelVisJs\ChartLine;
use Pjeutr\LaravelVisJs\ChartPieAndDoughnut;
use Pjeutr\LaravelVisJs\ChartRadar;
use Illuminate\Support\ServiceProvider;

class VisjsServiceProvider extends ServiceProvider
{

    /**
     * Array with colours configuration of the chartjs config file
     * @var array
     */
    protected $colours = [];

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'vis-template');
        $this->colours = config('chartjs.colours');
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
