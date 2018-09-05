<?php

/*
 * This file is part of the Cilex framework.
 *
 * (c) Mike van Riel <mike.vanriel@naenius.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace IceProductionz\LaravelMigrator\Service\Provider;

use IceProductionz\LaravelMigrator\Console\Provider\ContainerAwareApplication;
use Pimple\Container;
/**
 * Cilex Console Service Provider
 *
 * @author Beau Simensen <beau@dflydev.com>
 */
class Console implements \Pimple\ServiceProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function register(Container $pimple)
    {
        $pimple['console'] = function($pimple) {
            $console = new ContainerAwareApplication($pimple['console.name'], $pimple['console.version']);
            $console->setDispatcher($pimple['dispatcher']);
            $console->setContainer($pimple);
            return $console;
        };
    }
}