<?php

namespace IceProductionz\LaravelMigrator\Service\Fetcher\Factory;

use IceProductionz\LaravelMigrator\Service\Fetcher\Config;
use IceProductionz\LaravelMigrator\Service\Fetcher\Resolve\Resolver as Service;

/**
 * Class Resolver
 *
 * @package IceProductionz\LaravelMigrator\Service\Fetcher\Factory
 */
class Resolver
{
    /**
     * @param Config $config
     *
     * @return Service
     */
    public function make(Config $config): Service
    {
        return new Service($config);
    }
}
