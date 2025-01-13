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

	public function createAnimal($name, $race, $habitatId)
	{
		$query = "INSERT INTO animal (name, race, habitat_id) VALUES (?, ?, ?)";
		return $this->query($query, [$name, $race, $habitatId]);
	}

	//Core Model lacks join abscraction. Queries will be written manually.
	public function getAnimals()
	{
		$query = "SELECT a.id, a.name, a.race, h.title as habitat_title, i.path as image_path 
                  FROM $this->table a 
                  LEFT JOIN images i ON a.image_id = i.id
                  LEFT JOIN habitat h ON a.habitat_id = h.id";
		return $this->query($query);
	}

	public function updateAnimal($id, $name, $habitatId)
	{
		$query = "UPDATE animal SET name = ?, habitat_id = ? WHERE id = ?";
		return $this->query($query, [$name, $habitatId, $id]);
	}

	public function delete($id)
	{
		try
		{

			$query = "DELETE FROM animal WHERE id = ?";
			$this->query($query, [$id]);
			return true;
		}catch(\Exception $e)
		{
			return false;
		}

	}

	public function updateAnimalImagePath($id, $imageId)
	{
		$query = "UPDATE animal SET image_id = ? WHERE id = ?";
		return $this->query($query, [$imageId, $id]);
	}
}