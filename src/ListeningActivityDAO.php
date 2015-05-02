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
		$this->query("INSERT INTO weekly_listening_activity (artist_id, plays, date) VALUES ('{$artist->id()}', '{$playCount}', '{$date->format('Y-m-d')}')");
	}

	public function hasRunToday()
	{
		return $this->query("SELECT * FROM weekly_listening_activity WHERE date(date) = date('now')")->fetchArray();
	}

}