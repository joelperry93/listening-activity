<?php
namespace App\Scraper;

use App\DAO\ArtistDAO;
use App\DAO\ListeningActivityDAO;
use App\Resource\LastFmResource;
use App\Model\Artist;

class LastFmScraper 
{ 
    public function scrape(LastFmResource $resource) 
    {
        $listeningActivityDao = new ListeningActivityDAO;
        $artistDao            = new ArtistDAO;

        foreach ($resource->getWeeklyArtistChart() as $band) 
        {   
            if ( ! $artist = $artistDao->getByName($band->name))
            {
                $artist = $artistDao->add(new Artist($band->name));
            }

            $listeningActivityDao->add($artist, $band->playcount);
        }
    }
}