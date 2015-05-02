<?php 
require 'bootstrap.php';

$app = new Slim\Slim;

require 'routes.php';

$app->contentType('application/json');
$app->run();