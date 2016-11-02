<?php

require '../vendor/autoload.php';
require '../config.php';

$kernel = new \App\Kernel($config);

$kernel->run();