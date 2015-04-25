<?php 

$app->get('/:name', function ($name) {
    var_dump(parse_ini_file('configs/local.ini'));
});