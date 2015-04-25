<?php
namespace App\Scraper;

use App\DAO\ListeningActivityDAO;
use App\Resource\LastFmResource;

class LastFmScraper 
{ 
    protected $config;

    public function __construct($config) 
    {
        $this->config = $config;
    }

    public function scrape() 
    {
        $lastFmResource = new LastFmResource($this->config['user_name'], $this->config['api_key']);
        $dao            = new ListeningActivityDAO;

        $artists = $lastFmResource->getWeeklyArtistChart();

        var_dump($dao->getArtists());
    }

}