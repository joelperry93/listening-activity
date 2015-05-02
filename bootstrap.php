<?php 
namespace App;

// Load config
$config = parse_ini_file('configs/local.ini');

// Timezone
date_default_timezone_set('UTC');

// Error reporting
if ($config['display_errors']) {
    error_reporting(-1);
    ini_set('display_errors', 'On');
}

// Constants
define('ROOT_PATH', dirname(__FILE__).'/');
define('LIBRARY_PATH', ROOT_PATH.'src/');
define('DATABASE_FILE', ROOT_PATH.'storage.db');

// Loading
require 'vendor/autoload.php';
require LIBRARY_PATH.'LastFmResource.php';
require LIBRARY_PATH.'model/Artist.php';
require LIBRARY_PATH.'ArtistDAO.php';
require LIBRARY_PATH.'ListeningActivityDAO.php';
require LIBRARY_PATH.'LastFmScraper.php';