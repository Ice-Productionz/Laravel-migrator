<?php

namespace IceProductionzTests\UniversalMigration\Sample;

use IceProductionz\UniversalMigration\Migration\Migration;

class Manager implements \IceProductionz\UniversalMigration\Migration\Manager\Manager
{

    /**
     * @param $className
     *
     * @return bool
     */
    public function isMigrated($className): bool
    {
        return false;
    }

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function upgradeStarted(Migration $migration): void
    {
        echo  __CLASS__ . '::' . __FUNCTION__ . '() -> ' . $migration->getName() . "\r\n";
    }

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function upgradeCompleted(Migration $migration): void
    {
        echo  __CLASS__ . '::' . __FUNCTION__ . '() -> ' . $migration->getName() . "\r\n";
    }

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function downgradeStarted(Migration $migration): void
    {
        echo  __CLASS__ . '::' . __FUNCTION__ . '() -> ' . $migration->getName() . "\r\n";
    }

    /**
     * @param Migration $migration
     *
     * @return mixed
     */
    public function downgradeCompleted(Migration $migration): void
    {
        echo  __CLASS__ . '::' . __FUNCTION__ . '() -> ' . $migration->getName() . "\r\n";
    }
}