<?php 

class LastFmResource {

    protected $config;

    public function __constructor($config) {
        $this->config = $config;
    }

    public function getWeeklyArtistChart($config) {
        return json_decode(file_get_contents(
            "http://ws.audioscrobbler.com/2.0/?method=user.getweeklyartistchart&user={$config['user_name']}&api_key={$config['api_key']}&format=json"
        ));
    }
}