<?php

namespace IceProductionz\UniversalMigration\Migration\Manager;

use IceProductionz\UniversalMigration\Migration\Migration;

/**
 * Manage Migration completed
 */
interface Manager
{
    /**
     * @param Migration $migration
     *
     * @return bool
     */
    public function isMigrated(Migration $migration): bool;

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