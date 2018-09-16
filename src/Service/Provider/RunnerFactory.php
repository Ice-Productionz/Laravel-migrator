<?php

namespace IceProductionz\UniversalMigration\Service\Provider;

use Pimple\Container;

class RunnerFactory implements \Pimple\ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple['service.runnerFactory'] = function () {
            return new \IceProductionz\UniversalMigration\Service\Runner\Factory\Runner();
        };
    }
}