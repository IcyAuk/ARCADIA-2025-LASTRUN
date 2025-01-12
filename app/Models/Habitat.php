<?php

namespace App\Model;
use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Habitat
{
    use Model;
	protected $table = 'habitat';

	public function __construct()
	{
		$db = $this->openDatabaseConnection();
	}

	//Core Model lacks join abscraction. Queries will be written manually.
	public function getHabitats()
	{
		$query = "SELECT * FROM $this->table";
		return $this->query($query);
	}
}