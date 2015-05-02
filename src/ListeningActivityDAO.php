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

}