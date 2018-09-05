<?php

namespace IceProductionz\LaravelMigrator\Service\Fetcher\Resolve;

use IceProductionz\LaravelMigrator\Service\Fetcher\Config;

class Resolver
{
    /**
     * @var Config
     */
    private $config;

    /**
     * Resolve constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Get File
     *
     * @param string $file
     *
     * @return mixed
     */
    public function retrieveClass($file)
    {
        return require $this->config->getDir() . DIRECTORY_SEPARATOR . $file;
    }

    /**
     * Get Class Name
     *
     * @param string $file
     *
     * @return string
     */
    public function getClassName($file): string
    {
        $className = preg_replace('/^' . preg_quote($this->config->getPrefix(), '/') . '/', '', $file);
        $className .= preg_replace('/' . preg_quote($this->config->getSuffix(), '/') . '$/', '', $file);

        return  $this->config->getNamespace() . $className;
    }
}