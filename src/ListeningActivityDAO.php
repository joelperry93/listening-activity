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

	public function add(Artist $artist, $playCount) 
	{
		$this->query("INSERT INTO weekly_listening_activity (artist_id, plays) VALUES ('{$artist->id()}', '{$playCount}')");
	}

}