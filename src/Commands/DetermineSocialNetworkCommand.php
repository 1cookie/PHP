<?php

namespace App\Commands;

use Symfony\Component\Console\Command\Command;
use App\Services\SocialUrlParser;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class DetermineSocialNetworkCommand extends Command
{
    protected static $defaultName = 'app:determine-social-network';

    private $socialUrlParser;

    public function __construct(SocialUrlParser $socialUrlParser)
    {
        parent::__construct();

        $this->socialUrlParser = $socialUrlParser;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Determines a social network based on entered URL.')
            ->addArgument('url', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $url = $input->getArgument('url');

        $type = $this->socialUrlParser->getType($url);

        $output->writeln($type);

        return Command::SUCCESS;
    }
}
