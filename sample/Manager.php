<?php

namespace IceProductionzTests\UniversalMigration\Sample;

use IceProductionz\UniversalMigration\Migration\Manager\Manager as UniversalManager;
use IceProductionz\UniversalMigration\Migration\Migration;

class Manager implements UniversalManager
{

    /**
     * @param Migration $migration
     *
     * @return bool
     */
    public function isMigrated(Migration $migration): bool
    {
        echo  $migration->getName() . '() -> ' . __CLASS__ . '::' . __FUNCTION__ . "(): false\r\n";

        return true;
    }

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function upgradeStarted(Migration $migration): void
    {
        echo  $migration->getName() . '() -> ' . __CLASS__ . '::' . __FUNCTION__ . "()\r\n";
    }

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function upgradeCompleted(Migration $migration): void
    {
        echo  $migration->getName() . '() -> ' . __CLASS__ . '::' . __FUNCTION__ . "()\r\n";
    }

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function downgradeStarted(Migration $migration): void
    {
        echo  $migration->getName() . '() -> ' . __CLASS__ . '::' . __FUNCTION__ . "()\r\n";
    }

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function downgradeCompleted(Migration $migration): void
    {
        echo  $migration->getName() . '() -> ' . __CLASS__ . '::' . __FUNCTION__ . "()\r\n";
    }
}