<?php 
namespace App\Scripts;

use App\DAO\ArtistDAO;
use App\DAO\ListeningActivityDAO;
use App\Model\Artist;

require dirname(__FILE__).'/../../bootstrap.php';
define('SAVES_DIR', dirname(__FILE__).'/saves');


function getJSONFiles() 
{
    $saveFiles = scandir(SAVES_DIR);
    $jsonFiles = [];

    foreach ($saveFiles as $file) 
    {
        if (strpos($file, '.json')) 
        {
            $jsonFiles[] = $file;
        }    
    }

    return $jsonFiles;
}

function loadSaves() 
{
    $saves = [];

    foreach (getJSONFiles() as $file) 
    {
        $date = explode('.', $file)[0];
        $saves[$date] = json_decode(file_get_contents(SAVES_DIR.'/'.$file));
    }
    
    return $saves;
}

$artistDao = new ArtistDAO;
$listeningActivityDao = new ListeningActivityDAO;

foreach (loadSaves() as $date => $bands) 
{   
    foreach ($bands as $band)
    {
        if ( ! $artist = $artistDao->getByName($band->name))
        {
            $artist = $artistDao->add(new Artist($band->name));
        }

        $listeningActivityDao->add($artist, $band->plays, new \DateTime($date));
    }
}









