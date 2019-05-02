<?php

namespace App\Command;

use App\Service\TestService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CallServiceCommand extends Command
{
    protected static $defaultName = 'call:service';
    protected static $myService;

    public function __construct(TestService $ts, ?string $name = null)
    {
        parent::__construct($name);
        self::$myService = $ts;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $serviceResult = self::$myService->someMethod();

        $output->writeln($serviceResult);
    }
}
