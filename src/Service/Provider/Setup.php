<?php

namespace IceProductionz\UniversalMigration\Service\Provider;

use Pimple\Container;

class Setup implements \Pimple\ServiceProviderInterface
{

    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     *
     * @return Setup
     */
    public function register(Container $pimple): Setup
    {
        $pimple['service.setup'] = function () {
            return new \IceProductionz\UniversalMigration\Service\Setup\Factory\Setup();
        };

        return $this;
    }
}