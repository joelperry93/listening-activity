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

}