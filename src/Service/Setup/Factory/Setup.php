<?php

namespace IceProductionz\UniversalMigration\Service\Setup\Factory;

use IceProductionz\UniversalMigration\Exception\NotImplemented;
use IceProductionz\UniversalMigration\Service\Setup\ByAutoloaderInput;
use IceProductionz\UniversalMigration\Service\Setup\ByBaseLocation;
use IceProductionz\UniversalMigration\Service\Setup\ByWizard;
use IceProductionz\UniversalMigration\Service\Setup\Setup as Service;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class Setup
 *
 * @package IceProductionz\UniversalMigration\Service\Setup\Factory
 */
class Setup
{
    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @param QuestionHelper  $questionHelper
     *
     * @return Service
     */
    public function make(InputInterface $input, OutputInterface $output, QuestionHelper $questionHelper): Service
    {
//        if (!$input->hasArgument('autoloader')) {
//            return new ByBaseLocation();
//        }

        if ($input->hasArgument('autoloader')) {
            $autoloader = $input->getArgument('autoloader');
            $autoloader = str_replace('autoloader=', '', $autoloader);

            return new ByAutoloaderInput($autoloader);
        }

        return new ByWizard($input, $output, $questionHelper);
    }
}