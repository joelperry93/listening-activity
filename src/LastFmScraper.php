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

        var_dump( $artistDao->artistExists(new Artist('Biffy Clyro')) );

        exit;
        $artists = $artistDao->getArtists();

        foreach ($artists as $artist) {
            print $artist->name()."\n";
        }
    }
}