<?php

namespace IceProductionz\UniversalMigration\Service\Setup;

use IceProductionz\UniversalMigration\Service\Fetcher\Config;

class ByAutoloaderInput implements Setup
{
    private $path;

    /**
     * ByInput constructor.
     *
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Generate Config Based on the find one at the base location of the project
     *
     * @return Config
     */
    public function generateConfig(): Config
    {
        $content = file_get_contents($this->path);
        $json = \json_decode($content);

        $manager    = $json->manager ?? '';
        $dir        = $json->dir ?? '';
        $namespace  = $json->namespace ?? '';
        $prefix     = $json->prefix ?? '';
        $suffix     = $json->suffix ?? '';
        return new Config($manager, $dir, $namespace, $prefix, $suffix);
    }
}