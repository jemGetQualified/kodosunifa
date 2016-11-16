<?php

namespace Kodosunifa;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SniffCodesCommand extends Command
{
    protected function configure()
    {
        $this->setName('kodosunifa:sniff-code')
            ->setDescription('Sniff code into psr-2 based');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}