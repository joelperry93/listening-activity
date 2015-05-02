<?php
namespace App\DAO;

use SQLite3;
use App\Model\Artist;

class ArtistDAO extends SQLite3 
{
    public function __construct() 
    {
        $this->open(DATABASE_FILE);
    }

    public function getArtists()
    {
        $results = $this->query('
            SELECT * 
            FROM artist
        ');

        $artists = [];

        while ($row = $results->fetchArray()) 
        {
            $artists[] = new Artist($row['name'], 0, new \DateTime($row['date_added']));
        }

        return $artists;
    }

    public function addArtist(Artist $artist) 
    {
        $this->query("INSERT INTO artist (name) VALUES ('{$artist->name()}')");
    }

    public function artistExists(Artist $artist)
    {
        return $this->query("SELECT * FROM artist WHERE name = '{$artist->name()}'")->fetchArray() !== false;
    }

}