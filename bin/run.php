#!/usr/bin/env php
<?php

use IceProductionz\LaravelMigrator\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

if (!$loader = include __DIR__ . '/../vendor/autoload.php') {
    die('You must set up the project dependencies.');
}
$app = new Application('Laravel - Migration', '1.0.0');
$app->command(new \IceProductionz\LaravelMigrator\Command\Migration\Migrate());
$app->command('foo', function (InputInterface $input, OutputInterface $output) {
    $output->writeln('Example output');
});
$app->run();