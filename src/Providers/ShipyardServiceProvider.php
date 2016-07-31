<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16-7-30
 */

namespace Dubuqingfeng\Shipyard\Providers;

use Dubuqingfeng\ShipyardAPI\Client\Shipyard;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;


class ShipyardServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $source = realpath(__DIR__.'/../../config/shipyard.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('shipyard.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('shipyard');
        }
        $this->mergeConfigFrom($source, 'shipyard');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

        $this->registerFactory();
        $this->registerManager();
        $this->registerBindings();
//        $this->app->alias('rancher', 'Dubuqingfeng\Shipyard\Shipyard');
    }

    /**
     * Register the factory class.
     *
     * @return void
     */
    protected function registerFactory()
    {
        $this->app->singleton('shipyard.factory', function () {
            return new ShipyardFactory();
        });
        $this->app->alias('shipyard.factory', ShipyardFactory::class);
    }

    /**
     * Register the manager class.
     *
     * @return void
     */
    protected function registerManager()
    {
        $this->app->singleton('shipyard', function (Container $app) {
            $config = $app['config'];
            $factory = $app['shipyard.factory'];
            return new ShipyardManager($config, $factory);
        });
        $this->app->alias('shipyard', ShipyardManager::class);
    }

    /**
     * Register the bindings.
     *
     * @return void
     */
    protected function registerBindings()
    {
        $this->app->bind('shipyard.connection', function (Container $app) {
            $manager = $app['shipyard'];
            return $manager->connection();
        });
        $this->app->alias('shipyard.connection', Shipyard::class);
    }

}