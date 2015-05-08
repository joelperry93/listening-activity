<?php
namespace App\Scraper;

use App\DAO\ArtistDAO;
use App\DAO\ListeningActivityDAO;
use App\Resource\ResourceInterface;
use App\Model\Artist;

class LastFmScraper implements ScraperInterface
{ 
    public function scrape(ResourceInterface $resource) 
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