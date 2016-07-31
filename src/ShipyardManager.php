<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16-7-31
 */

namespace Dubuqingfeng\Shipyard;


use GrahamCampbell\Manager\AbstractManager;
use Illuminate\Contracts\Config\Repository;

class ShipyardManager extends AbstractManager
{
    /**
     * The factory instance.
     *
     * @var ShipyardFactory
     */
    protected $factory;

    /**
     * Create a new dropbox manager instance.
     *
     * @param \Illuminate\Contracts\Config\Repository $config
     * @param Ship
     *
     * @return void
     */
    public function __construct(Repository $config, ShipyardFactory $factory)
    {
        parent::__construct($config);
        $this->factory = $factory;
    }

    /**
     * Create the connection instance.
     *
     * @param array $config
     *
     * @return ShipyardFactory
     */
    protected function createConnection(array $config)
    {
        return $this->factory->make($config);
    }

    /**
     * Get the configuration name.
     *
     * @return string
     */
    protected function getConfigName()
    {
        return 'shipyard';
    }

    /**
     * Get the factory instance.
     *
     * @return ShipyardFactory
     */
    public function getFactory()
    {
        return $this->factory;
    }
}