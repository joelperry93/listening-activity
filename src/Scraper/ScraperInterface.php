<?php 
namespace LA\Scraper;

use LA\Resource\ResourceInterface;

interface ScraperInterface 
{
    public function scrape(ResourceInterface $resource);
}