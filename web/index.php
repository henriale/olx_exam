<?php

require '../vendor/autoload.php';
require '../config.php';

try {
    $kernel = new \App\Kernel($config);
    $kernel->run();
} catch (\Exception $exception) {
    $caught = $config['exception_handler']->handle($exception);

    if (! $caught) {
        // output exception when debug in on
        throw $exception;
    }
}