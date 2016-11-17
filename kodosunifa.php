#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use Kodosunifa\SniffCodesCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new SniffCodesCommand());
$application->run();