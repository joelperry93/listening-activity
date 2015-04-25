<?php 
$config = parse_ini_file('configs/local.ini');

if ($config['display_errors']) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

require 'vendor/autoload.php';

$app = new Slim\Slim;

require 'routes.php';

$app->run();