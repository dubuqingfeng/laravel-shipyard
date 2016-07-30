<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16-7-30
 */

namespace Dubuqingfeng\Shipyard;

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
        $configPath = __DIR__ . '/../config/shipyard.php';
        $this->publishes([$configPath => $this->getConfigPath()],'config');
        $this->mergeConfigFrom($configPath,"shipyard");
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {

    }

    public function getConfigPath(){
        return config_path("shipyard.php");
    }

}