<?php 
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
define('DATABASE_FILE', ROOT_PATH.'storage.db');

require 'vendor/autoload.php';