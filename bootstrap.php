<?php 
$config = parse_ini_file('configs/local.ini');

if ($config['display_errors']) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

define('ROOT_PATH', dirname(__FILE__).'/');

require 'vendor/autoload.php';
require 'lib/LastFmResource.php';
require 'lib/ListeningActivityDAO.php';
require 'lib/LastFmScraper.php';