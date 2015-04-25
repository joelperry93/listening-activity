<?php
namespace App\DAO;

use SQLite3;

class ListeningActivityDAO extends SQLite3 
{
	public function __construct() 
	{
		$this->open(ROOT_PATH.'storage/storage.db');
	}

	public function addVerificationKey($key)
	{
		$this->query('
			INSERT INTO VerificationKey 
			(Key) VALUES ("'.$key.'")
		');
	}

	public function getArtists()
	{
		return $this->query('
			SELECT * 
			FROM artist
		')->fetchArray();
	}
}