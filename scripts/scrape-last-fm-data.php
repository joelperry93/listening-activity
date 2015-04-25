<?php
require 'lib/LastFmResource.php';

$config = parse_ini_file('../configs/local.ini');;

echo (new LastFmResource)->getWeeklyArtistChart($config);

echo "\n";