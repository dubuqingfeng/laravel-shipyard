<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16-7-31
 */

namespace Dubuqingfeng\Shipyard;


use Dubuqingfeng\ShipyardAPI\Client\Shipyard;
use InvalidArgumentException;

class ShipyardFactory
{
    /**
     * Make a new Shipyard client.
     *
     * @param string[] $config
     *
     * @return \Dubuqingfeng\ShipyardAPI\Client\Shipyard
     */
    public function make(array $config)
    {
        $config = $this->getConfig($config);

        return $this->getClient($config);
    }

    /**
     * Get the configuration data.
     *
     * @param string[] $config
     *
     * @throws \InvalidArgumentException
     *
     * @return string[]
     */
    protected function getConfig(array $config)
    {
        if (!array_key_exists('base_url', $config) || !array_key_exists('service_key', $config)) {
            throw new InvalidArgumentException('The Shipyard client requires authentication.');
        }

        return array_only($config, ['base_url', 'service_key']);
    }

    /**
     * Get the Shipyard client.
     *
     * @param string[] $auth
     *
     * @return Shipyard
     */
    protected function getClient(array $auth)
    {
        return new Shipyard($auth);
    }
}