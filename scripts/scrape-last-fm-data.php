<?php 
namespace App\Scripts;

use App\Scraper\LastFmScraper;
use App\Resource\LastFmResource;

require dirname(__FILE__).'/../bootstrap.php';

(new LastFmScraper)->scrape(new LastFmResource($config['user_name'], $config['api_key']));