<?php

namespace IceProductionz\LaravelMigrator\Service\Runner;

use IceProductionz\LaravelMigrator\Migration\Collection;

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
     * Downgrade constructor.
     *
     * @param Collection $migrations
     */
    public function __construct(Collection $migrations)
    {
        $this->migrations = $migrations;
    }

    public function run(): void
    {
        foreach ($this->migrations->all() as $migration)
        {
            $migration->down();
        }
    }
}
