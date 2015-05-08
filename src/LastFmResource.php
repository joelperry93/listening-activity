<?php 
namespace App\Resource;

use App\Resource\ResourceInterface;

class LastFmResource implements ResourceInterface
{
    protected $username;
    protected $apiKey;

    public function __construct($username, $apiKey) 
    {
        $this->username = $username;
        $this->apiKey   = $apiKey;
    }

    public function getWeeklyArtistChart() 
    {
        return json_decode(file_get_contents(
            "http://ws.audioscrobbler.com/2.0/?method=user.getweeklyartistchart&user={$this->username}&api_key={$this->apiKey}&format=json"
        ))->weeklyartistchart->artist;
    }

}