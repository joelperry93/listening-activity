<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

require 'vendor/autoload.php';

$app = new Slim\Slim;

require 'routes.php';

$app->run();