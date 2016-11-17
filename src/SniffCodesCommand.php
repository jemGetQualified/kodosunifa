<?php

namespace Kodosunifa;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

class SniffCodesCommand extends Command
{
    protected function configure()
    {
        $this->setName('kodosunifa:sniff-code')->setDescription('Sniff code into psr-2 based');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Sniffing Codes...');

        $process = new Process('phpcs -n --standard=PSR2 --ignore=*/tests/*,*/data/*,*/storage/*,*/test/*,*/vendor/* app/ bootstrap/ config, routes');
        $process->run();

        if ($process->getOutput()) {
            $this->handleErrorMessages($process->getOutput(), $output);
            exit(1);
        }

        $this->handleSuccessMessages($output);
        exit(0);
    }

    /**
     * @param string $message
     * @param OutputInterface $output
     */
    private function handleErrorMessages($message, OutputInterface $output)
    {
        $output->writeln($message);
        $output->writeln('<error>STYLE CHECK FOUND ERRORS PLEASE FIX BEFORE PROCEEDING!</error>');
    }

    /**
     * @param OutputInterface $output
     */
    private function handleSuccessMessages(OutputInterface $output)
    {
        $output->writeln('<info>PSR-2 STYLE CHECK PASSED</info>');
    }
}
