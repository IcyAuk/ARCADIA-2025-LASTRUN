<?php

namespace App\Model;
use App\Core\Model;
use App\Model\Session;

defined('ROOTPATH') OR exit('Access Denied!');

class Animal
{
    use Model;
	protected $table = 'animal';

	public function __construct()
	{
		$db = $this->openDatabaseConnection();
	}

	public function getAnimals()
	{
		$query = "SELECT a.id, a.name, a.race, h.title as habitat_title, i.path as image_path 
                  FROM $this->table a 
                  LEFT JOIN images i ON a.image_id = i.id
                  LEFT JOIN habitat h ON a.habitat_id = h.id";
		return $this->query($query);
	}

	public function updateAnimalImagePath($id, $imageId)
	{
		$query = "UPDATE animal SET image_id = ? WHERE id = ?";
		return $this->query($query, [$imageId, $id]);
	}
}