<?php

namespace IceProductionz\LaravelMigrator\Service\Fetcher;

use IceProductionz\LaravelMigrator\Migration\Collection;
use IceProductionz\LaravelMigrator\Service\Fetcher\Factory\Resolver;

/**
 * Interface Fetcher
 *
 * @package IceProductionz\LaravelMigrator\Service\Fetcher
 */
class Fetcher
{
    /**
     * @var Resolver
     */
    private $resolverFactory;

    public function __construct(Resolver $resolverFactory)
    {
        $this->resolverFactory = $resolverFactory;
    }

    /**
     * @param Config $config
     *
     * @return Collection
     */
    public function retrieve(Config $config): Collection
    {
        $resolve = $this->resolverFactory->make($config);
        $list = [];
        foreach (scandir($config->getDir(), SCANDIR_SORT_NONE) as $file) {
            if ($file === '..' || $file === '.') {
                continue;
            }

            if (is_dir($config->getDir() . DIRECTORY_SEPARATOR . $file)) {
                continue;
            }

            $resolve->retrieveClass($file);

            $className = $resolve->getClassName($resolve);

            $object = new $className;

            $list[] = $object;
        }

        return new Collection(...$list);
    }
}