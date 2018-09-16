<?php

namespace IceProductionz\UniversalMigration\Service\Setup;

use IceProductionz\UniversalMigration\Service\Fetcher\Config;

class ByBaseLocation implements Setup
{

    /**
     * Generate Config  Based on the find one at the base location of the project
     *
     * @return Config
     */
    public function generateConfig(): Config
    {
        $fileName = 'migration.config.json';

        $path = __DIR__ . '/../../../../../../';

        $content = file_get_contents($path . $fileName);
        $json = \json_encode($content, JSON_OBJECT_AS_ARRAY);
        $json = \is_array($json) ? $json : (array)$json;

        $dir = isset($json['dir']) ?? '';
        $namespace = isset($json['namespace']) ?? '';
        $prefix = isset($json['prefix']) ?? '';
        $suffix = isset($json['suffix']) ?? '';
        return new Config($dir, $namespace, $prefix, $suffix);
    }
}