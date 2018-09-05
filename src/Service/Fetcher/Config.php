<?php

namespace IceProductionz\LaravelMigrator\Service\Fetcher;

class Config
{
    /**
     * @var string
     */
    private $dir;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $suffix;

    /**
     * Config constructor.
     *
     * @param string $dir
     * @param string $namespace
     * @param string $prefix
     * @param string $suffix
     */
    public function __construct(string $dir, string $namespace ='\\', string $prefix='', string $suffix='')
    {
        $this->dir = $dir;
        $this->namespace = $namespace;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }

    /**
     * @return string
     */
    public function getDir(): string
    {
        return $this->dir;
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @return string
     */
    public function getSuffix(): string
    {
        return $this->suffix;
    }
}
