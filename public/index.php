<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require '../vendor/autoload.php';

$api = new Slim\Slim;

$api->get('/:hello', function ($name) {
    echo $name;
});

$api->run();