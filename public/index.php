<?php
// project root path
use JCI\Console\ConsoleApplication;

define('PROJECT_PATH',   realpath(__DIR__ . '/../'));

// autoloading
require PROJECT_PATH . '/vendor/autoload.php';

$application = new ConsoleApplication();
$application->run();