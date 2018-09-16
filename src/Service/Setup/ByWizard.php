<?php

namespace IceProductionz\UniversalMigration\Service\Setup;

use IceProductionz\UniversalMigration\Service\Fetcher\Config;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

class ByWizard implements Setup
{
    /**
     * @var InputInterface
     */
    private $input;

    /**
     * @var OutputInterface
     */
    private $output;
    /**
     * @var QuestionHelper
     */
    private $helper;

    /**
     * ByWizard constructor.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     * @param QuestionHelper $helper
     */
    public function __construct(InputInterface $input, OutputInterface $output, QuestionHelper $helper)
    {
        $this->input = $input;
        $this->output = $output;
        $this->helper = $helper;
    }

    /**
     * @return Config
     */
    public function generateConfig(): Config
    {
        $dirQuestion = new Question('What is the migration directory?');
        $dirQuestion->setValidator(function ($value) {
            if (trim($value) === '') {
                throw new \InvalidArgumentException('The directory cannot be empty');
            }

            if (is_dir($value) === false) {
                throw new \InvalidArgumentException('The directory path is not valid');
            }

            return $value;
        });
        $dir = $this->helper->ask($this->input, $this->output, $dirQuestion);

        $namespaceQuestion = new Question('What is the migration namespace?');
        $namespaceQuestion->setValidator(function ($value) {
            if (trim($value) === '') {
                return '';
            }

            return $value;
        });
        $namespace = $this->helper->ask($this->input, $this->output, $namespaceQuestion);

        $prefixQuestion = new Question('What is the class name prefix? Regex is supported');
        $prefixQuestion->setValidator(function ($value) {
            if (trim($value) === '') {
                return '';
            }

            return $value;
        });
        $prefix = $this->helper->ask($this->input, $this->output, $prefixQuestion);

        $suffixQuestion = new Question('What is the class name suffix? Regex is supported');
        $suffixQuestion->setValidator(function ($value) {
            if (trim($value) === '') {
                return '';
            }

            return $value;
        });
        $suffix = $this->helper->ask($this->input, $this->output, $suffixQuestion);


        return new Config($dir, $namespace, $prefix, $suffix);
    }
}