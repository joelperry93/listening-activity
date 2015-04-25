<?php 

$app->get('/:hello', function ($name) {
    echo $name;
});