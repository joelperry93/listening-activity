<?php
namespace App\DAO;

use SQLite3;
use App\Model\Artist;

class ListeningActivityDAO extends SQLite3 
{
	public function __construct() 
	{
		$this->open(DATABASE_FILE);
	}

	public function add(Artist $artist, $playCount, \DateTime $date) 
	{
		$statement = $this->prepare("INSERT INTO weekly_listening_activity (artist_id, plays, date) VALUES (:id, :plays, :date)");
        $statement->bindValue(':id', $artist->id(), SQLITE3_INTEGER);
        $statement->bindValue(':plays', $playCount, SQLITE3_INTEGER);
        $statement->bindValue(':date', $date->format('Y-m-d'), SQLITE3_BLOB);
        $statement->execute();
	}

	public function hasRunToday()
	{
		return $this->query("SELECT * FROM weekly_listening_activity WHERE date(date) = date('now')")->fetchArray();
	}

    public function getAll()
    {
        $data = [];

        foreach ($this->getDates() as $date)
        {
            $data[$date] = $this->getByDate($date);
        }

        return $data;
    }

    public function getByDate($date)
    {
        $data = [];
        $statement = $this->prepare(
            'SELECT a.name, wla.plays, wla.date
            FROM weekly_listening_activity wla
            JOIN artist a on wla.artist_id = a.id
            WHERE wla.date = :date');
        $statement->bindValue(':date', $date, SQLITE3_BLOB);

        $results = $statement->execute();

        while ($row = $results->fetchArray())
        {
            $data[] = ['name' => $row['name'], 'plays' => $row['plays']];
        }

        return $data;
    }

    public function getDates()
    {
        $results = $this->query('SELECT DISTINCT date FROM weekly_listening_activity');
        $dates   = [];

        while ($row = $results->fetchArray())
        {
            $dates[] = $row['date'];
        }

        return $dates;
    }

}






