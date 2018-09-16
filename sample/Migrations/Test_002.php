<?php

namespace IceProductionzTests\UniversalMigration\Sample\Migrations;

use IceProductionz\UniversalMigration\Migration\Migration;

class Test_002 implements Migration
{

    /**
     * Return name of the migration
     *
     * @return string
     */
    public function getName(): string
    {
        return static::class;
    }

    /**
     * Upgrade migration code
     *
     * @return void
     */
    public function up(): void
    {
        // TODO: Implement up() method.
    }

    /**
     * Downgrade migration code
     *
     * @return void
     */
    public function down(): void
    {
        // TODO: Implement down() method.
    }
}