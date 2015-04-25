<?php 
namespace App\Resources;

class LastFmResource {

    protected $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function getWeeklyArtistChart() {
        return json_decode(file_get_contents(
            "http://ws.audioscrobbler.com/2.0/?method=user.getweeklyartistchart&user={$this->config['user_name']}&api_key={$this->config['api_key']}&format=json"
        ))->weeklyartistchart->artist;
    }
}