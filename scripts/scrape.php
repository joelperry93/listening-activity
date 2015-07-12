<?php 
namespace LA\Scripts;

use LA\Scraper\LastFmScraper;
use LA\Resource\LastFmResource;

require dirname(__FILE__).'/../bootstrap.php';

(new LastFmScraper)->scrape(new LastFmResource($config['user_name'], $config['api_key']));