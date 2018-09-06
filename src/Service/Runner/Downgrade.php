<?php

namespace IceProductionz\LaravelMigrator\Service\Runner;

use IceProductionz\LaravelMigrator\Migration\Collection;
use IceProductionz\LaravelMigrator\Migration\Manager\Manager;

/**
 * Class Downgrade
 *
 * @package IceProductionz\LaravelMigrator\Service\Runner
 */
class Downgrade implements Runner
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
     * Downgrade constructor.
     *
     * @param Collection $migrations
     * @param Manager    $manager
     */
    public function __construct(Collection $migrations, Manager $manager)
    {
        $this->migrations = $migrations;
        $this->manager = $manager;
    }

    public function run(): void
    {
        foreach ($this->migrations->all() as $migration)
        {
            if (!$this->manager->isMigrated($migration)) {
                continue;
            }

            $this->manager->downgradeStarted($migration);

            $migration->down();

            $this->manager->downgradeCompleted($migration);
        }
    }
}
