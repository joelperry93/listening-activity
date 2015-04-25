<?php 
namespace App\Scripts;

require '../bootstrap.php';

(new \App\Lib\LastFmScraper($config))->scrape();