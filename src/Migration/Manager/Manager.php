<?php

namespace IceProductionz\LaravelMigrator\Migration\Manager;

use IceProductionz\LaravelMigrator\Migration\Migration;

/**
 * Manage Migration completed
 */
interface Manager
{
    /**
     * @param $className
     *
     * @return bool
     */
    public function isMigrated($className): bool;

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function upgradeStarted(Migration $migration): void;

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function upgradeCompleted(Migration $migration): void;

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function downgradeStarted(Migration $migration): void;

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function downgradeCompleted(Migration $migration): void;

}