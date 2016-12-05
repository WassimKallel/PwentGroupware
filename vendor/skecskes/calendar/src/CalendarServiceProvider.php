<?php namespace Skecskes\Calendar;

use Illuminate\Support\ServiceProvider;

class CalendarServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        $this->app->singleton('Skecskes\Calendar\Calendar', function($app) {
            return new Calendar();
        });
    }

    /**
     * Bootstrap the configuration
     *
     * @return void
     */
    public function boot()
    {
        $config = __DIR__ . '/config/calendar.php';
        //$this->mergeConfigFrom($config, 'calendar');
        $this->publishes([$config => config_path('calendar.php')]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return ['Skecskes\Calendar\Calendar'];
    }

}
