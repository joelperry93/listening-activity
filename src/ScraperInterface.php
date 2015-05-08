<?php 
namespace App\Scraper;

use App\Resource\ResourceInterface;

interface ScraperInterface 
{
    public function scrape(ResourceInterface $resource);
}