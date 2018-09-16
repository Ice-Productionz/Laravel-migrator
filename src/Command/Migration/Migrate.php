<?php

namespace IceProductionz\UniversalMigration\Command\Migration;

use IceProductionz\UniversalMigration\Console\Provider\Command;
use IceProductionz\UniversalMigration\Service\Fetcher\Fetcher;
use IceProductionz\UniversalMigration\Service\Runner\Factory\Runner as RunnerFactory;
use IceProductionz\UniversalMigration\Service\Setup\Factory\Setup;
use Symfony\Component\Console\Input\InputArgument;
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
    /**
     * @var Setup
     */
    private $setupFactory;

    public function __construct(RunnerFactory $runnerFactory, Fetcher $fetcher, Setup $setupFactory)
    {
        parent::__construct(null);

        $this->runnerFactory = $runnerFactory;
        $this->fetcher = $fetcher;
        $this->setupFactory = $setupFactory;
    }


    protected function configure(): void
    {
        parent::configure();

        $this
            ->setName('migration:migrate')
            ->setDescription('Run Migrations')
            ->addArgument('direction', InputArgument::OPTIONAL, 'direction migration should run [up, down]')
            ->addArgument('autoloader', InputArgument::OPTIONAL, 'path for composer autoloader');

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
        $type = 'up';


        $config = $this->setupFactory->make($input, $output, $this->getHelper('question'))->generateConfig();

        $collections = $this->fetcher->retrieve($config);

        $manager = $config->getManager();
        $manager = new $manager;

        $runner = $this->runnerFactory->make($type, $collections, $manager);
        $runner->run();
        return 0;
    }
}