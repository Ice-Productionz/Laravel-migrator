<?php

namespace IceProductionz\UniversalMigration\Service\Setup;


use IceProductionz\UniversalMigration\Service\Fetcher\Config;

interface Setup
{

    public function generateConfig(): Config;
}