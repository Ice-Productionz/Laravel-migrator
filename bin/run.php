#!/usr/bin/env php
<?php

use IceProductionz\UniversalMigration\Application;
use IceProductionz\UniversalMigration\Command\Migration\Migrate;
use IceProductionz\UniversalMigration\Service\Provider\Fetcher;
use IceProductionz\UniversalMigration\Service\Provider\RunnerFactory;
use IceProductionz\UniversalMigration\Service\Provider\Setup;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

if (!$loader = include __DIR__ . '/../vendor/autoload.php') {
    die('You must set up the project dependencies.');
}
$app = new Application('Universal - Migration', '1.0.0');
/**
 * Setup Service providers
 */
$app->register(new Fetcher());
$app->register(new RunnerFactory());
$app->register(new Setup());

/**
 *  Setup Commands
 */
$app->command(
        new Migrate(
            $app->offsetGet('service.runnerFactory'),
            $app->offsetGet('service.fetcher'),
            $app->offsetGet('service.setup')
        )
);
$app->command('foo', function (InputInterface $input, OutputInterface $output) {
    $output->writeln('Example output');
});
$app->run();
