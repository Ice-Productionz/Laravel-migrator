<?php

namespace IceProductionz\UniversalMigration\Service\Provider;

use IceProductionz\UniversalMigration\Service\Fetcher\Factory\Resolver;
use IceProductionz\UniversalMigration\Service\Fetcher\Fetcher as Service;
use Pimple\Container;

class Fetcher implements \Pimple\ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     *
     * @return Fetcher
     */
    public function register(Container $pimple): Fetcher
    {
        $pimple['service.fetcher'] = function () {
            $resolveFactory = new Resolver();

            return new Service($resolveFactory);
        };

        return $this;
    }
}