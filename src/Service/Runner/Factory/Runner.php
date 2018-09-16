<?php

namespace IceProductionz\UniversalMigration\Service\Runner\Factory;

use IceProductionz\UniversalMigration\Exception\NotImplemented;
use IceProductionz\UniversalMigration\Migration\Collection;
use IceProductionz\UniversalMigration\Migration\Manager\Manager;
use IceProductionz\UniversalMigration\Service\Runner\Downgrade;
use IceProductionz\UniversalMigration\Service\Runner\Runner as Service;
use IceProductionz\UniversalMigration\Service\Runner\Upgrade;

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
    public function make(string $type, Collection $migrations, Manager $manager): Service
    {
        switch ($type) {
            case static::TYPE_UP;
                return new Upgrade($migrations, $manager);

            case static::TYPE_DOWN:
                return new Downgrade($migrations, $manager);
        }
        throw new NotImplemented('Requested type has not been implemented yet');
    }
}