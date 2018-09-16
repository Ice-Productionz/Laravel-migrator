<?php

namespace IceProductionz\UniversalMigration\Migration;

interface Migration
{
    /**
     * Return name of the migration
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Upgrade migration code
     *
     * @return void
     */
    public function up(): void;

    /**
     * Downgrade migration code
     *
     * @return void
     */
    public function down(): void;
}