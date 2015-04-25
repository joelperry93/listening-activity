<?php 
namespace App\Scripts;

require dirname(__FILE__).'/../bootstrap.php';

(new \App\Lib\LastFmScraper($config))->scrape();