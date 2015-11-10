<?php namespace JohnRivs\Wunderlist\Laravel;

use JohnRivs\Wunderlist\Wunderlist;
use Illuminate\Support\ServiceProvider;

/**
 * Class WunderlistServiceProvider
 *
 * @package JohnRivs\Wunderlist\Laravel
 */
class WunderlistServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Holds path to Config File.
     *
     * @var string
     */
    protected $config_filepath;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            $this->config_filepath => config_path('wunderlist.php'),
        ]);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->registerWunderlist();

        $this->config_filepath = __DIR__.'/config/wunderlist.php';

        $this->mergeConfigFrom($this->config_filepath, 'wunderlist');
    }

    /**
     * Initialize Wunderlist SDK with Default Config.
     */
    public function registerWunderlist()
    {
        $this->app->singleton('wunderlist', function ($app) {
            $config = $app['config'];



            $wunderlist = new Wunderlist(
                $config->get('wunderlist.client_id', null),
                $config->get('wunderlist.client_secret', null),
                $config->get('wunderlist.token', null)
            );


            return $wunderlist;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['wunderlist'];
    }
}
