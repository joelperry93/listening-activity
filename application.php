<?php 
require 'bootstrap.php';

$app = new Slim\Slim;

require 'routes.php';

$app->run();