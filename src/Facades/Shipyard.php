<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16-7-30
 */

namespace Dubuqingfeng\Shipyard\Facades;

use Illuminate\Support\Facades\Facade;


class Shipyard extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'shipyard';
    }
}