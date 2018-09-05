<?php

namespace IceProductionz\LaravelMigrator\Service\Runner\Factory;

use IceProductionz\LaravelMigrator\Exception\NotImplemented;
use IceProductionz\LaravelMigrator\Migration\Collection;
use IceProductionz\LaravelMigrator\Service\Runner\Downgrade;
use IceProductionz\LaravelMigrator\Service\Runner\Runner as Service;
use IceProductionz\LaravelMigrator\Service\Runner\Upgrade;

class Runner
{
    public const TYPE_UP = 'up';

    public const TYPE_DOWN = 'down';

    /**
     * @param string     $type
     * @param Collection $migrations
     *
     * @return Service
     * @throws NotImplemented
     */
    public function make(string $type, Collection $migrations): Service
    {
        switch ($type) {
            case static::TYPE_UP;
                return new Upgrade($migrations);

            case static::TYPE_DOWN:
                return new Downgrade($migrations);
        }
        throw new NotImplemented('Requested type has not been implemented yet');
    }
}