<?php

namespace IceProductionz\LaravelMigrator\Service\Runner;

use IceProductionz\LaravelMigrator\Migration\Collection;
use IceProductionz\LaravelMigrator\Migration\Manager\Manager;

/**
 * Class Upgrade
 *
 * @package IceProductionz\LaravelMigrator\Service\Runner
 */
class Upgrade implements Runner
{
    /**
     * @var Collection
     */
    private $migrations;
    /**
     * @var Manager
     */
    private $manager;

    /**
     * Upgrade constructor.
     *
     * @param Collection $migrations
     * @param Manager    $manager
     */
    public function __construct(Collection $migrations, Manager $manager)
    {
        $this->migrations = $migrations;
        $this->manager = $manager;
    }

    /**
     * Upgrade all migrations
     */
    public function run(): void
    {
        foreach ($this->migrations->all() as $migration)
        {
            if ($this->manager->isMigrated($migration)) {
                continue;
            }

            $this->manager->upgradeStarted($migration);

            $migration->up();

            $this->manager->upgradeCompleted($migration);
        }
    }
}
