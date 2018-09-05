<?php

namespace IceProductionz\LaravelMigrator\Command\Migration;

use IceProductionz\LaravelMigrator\Console\Provider\Command;
use IceProductionz\LaravelMigrator\Service\Fetcher\Fetcher;
use IceProductionz\LaravelMigrator\Service\Runner\Factory\Runner as RunnerFactory;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Migrate extends Command
{
    /**
     * @var RunnerFactory
     */
    private $runnerFactory;

    /**
     * @var Fetcher
     */
    private $fetcher;

    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('migration:migrate')
            ->setDescription('Run Migrations');

//        $this->runnerFactory = $this->getContainer()['service.runner'];
//
//        $this->fetcher = $this->getContainer()['service.fetcher'];
    }

    /**
     * This will be used to configure execute migrations
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $type = $input->getArgument('type');
        $directory = $input->getArgument('directory');
        $namespace = $input->getArgument('directory');

        $collections = $this->fetcher->retrieve($directory, $namespace);

        $this->runnerFactory->make($type, $collections);

        return 0;
    }
}