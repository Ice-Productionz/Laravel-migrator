<?php

namespace IceProductionz\LaravelMigrator\Service\Runner;

use IceProductionz\LaravelMigrator\Migration\Collection;

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
     * Upgrade constructor.
     *
     * @param Collection $migrations
     */
    public function __construct(Collection $migrations)
    {
        $this->migrations = $migrations;
    }

    /**
     * Upgrade all migrations
     */
    public function run(): void
    {
        foreach ($this->migrations->all() as $migration)
        {
            $migration->up();
        }
    }
}
