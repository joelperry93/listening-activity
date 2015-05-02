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

        if ($listeningActivityDao->hasRunToday()) 
        {
            exit;
        }

        foreach ($resource->getWeeklyArtistChart() as $entry) 
        {   
            if ( ! $artist = $artistDao->getByName($entry->name))
            {
                $artist = $artistDao->add(new Artist($entry->name));
            }

            $listeningActivityDao->add($artist, $entry->playcount, new \DateTime);
        }
    }
}