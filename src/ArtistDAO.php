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

    public function getAll()
    {
        $results = $this->query('SELECT * FROM artist');
        $artists = [];

        while ($row = $results->fetchArray()) 
        {
            $artists[] = $this->makeArtistWithRow($row);
        }

        return $artists;
    }

    public function add(Artist $artist) 
    {
        $this->query("INSERT INTO artist (name) VALUES ('{$artist->name()}')");
        
        return $this->getByName($artist->name());
    }

    public function getByName($name)
    {
        $row = $this->query("SELECT * FROM artist WHERE name = '{$name}'")->fetchArray();
        return $row ? $this->makeArtistWithRow($row) : false;
    }

    private function makeArtistWithRow($row) 
    {
        return new Artist($row['name'], new \DateTime($row['date_added']), $row['id']);
    }

}