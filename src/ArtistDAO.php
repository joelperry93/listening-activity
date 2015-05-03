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
        $statement = $this->prepare("INSERT INTO artist (name) VALUES (:name)");
        $statement->bindValue(':name', $artist->name(), SQLITE3_TEXT);
        $statement->execute();

        return $this->getByName($artist->name());
    }

    public function getByName($name)
    {
        $statement = $this->prepare("SELECT * FROM artist WHERE name = :name");
        $statement->bindValue(':name', $name, SQLITE3_TEXT);
        $row = $statement->execute()->fetchArray();

        return $row ? $this->makeArtistWithRow($row) : false;
    }

    private function makeArtistWithRow($row) 
    {
        return new Artist($row['name'], new \DateTime($row['date_added']), $row['id']);
    }

    public function getNames()
    {
        $results = $this->query('SELECT name FROM artist ORDER BY name');
        $artists = [];
        
        while ($result = $results->fetchArray())
        {
            $artists[] = $result['name'];
        }
        
        return $artists;
    }

}