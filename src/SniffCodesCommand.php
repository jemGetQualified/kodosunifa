<?php

namespace Kodosunifa;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SniffCodesCommand extends Command
{
    protected function configure()
    {
        $this->setName('kodosunifa:sniff-code')
            ->setDescription('Sniff code into psr-2 based');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Sniffing Codes...');

        $process = new Process('phpcs -n --standard=PSR2 app/Http/Controllers/');
        $process->run();

        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();

    }
}