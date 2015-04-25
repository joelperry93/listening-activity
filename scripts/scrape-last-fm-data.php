<?php 
namespace App\Scripts;

require '../lib/LastFmResource.php';
require '../lib/ListeningActivityDAO.php';

use App\DAO\ListeningActivityDAO;
use App\Resources\LastFmResource;

$config = parse_ini_file('../configs/local.ini');

$lastFmResource = new LastFmResource($config);
$dao            = new ListeningActivityDAO;

$artists = $lastFmResource->getWeeklyArtistChart();

var_dump($dao->getArtists()->fetchArray());