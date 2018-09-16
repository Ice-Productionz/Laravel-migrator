<?php

namespace IceProductionz\UniversalMigration\Service\Fetcher\Factory;

use IceProductionz\UniversalMigration\Service\Fetcher\Config;
use IceProductionz\UniversalMigration\Service\Fetcher\Resolve\Resolver as Service;

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
