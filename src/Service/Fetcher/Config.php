<?php

namespace IceProductionz\UniversalMigration\Service\Fetcher;

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
     * @var string
     */
    private $manager;

    /**
     * Config constructor.
     *
     * @param string $manager
     * @param string $dir
     * @param string $namespace
     * @param string $prefix
     * @param string $suffix
     */
    public function __construct(string $manager, string $dir, string $namespace ='\\', string $prefix='', string $suffix='')
    {
        $this->dir = $dir;
        $this->namespace = $namespace;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $this->manager = $manager;
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

    /**
     * @return string
     */
    public function getManager(): string
    {
        return $this->manager;
    }
}
