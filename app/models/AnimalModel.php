<?php

namespace App\Model;

use App\Core\Model;
use App\Interfaces\IModel;

defined('ROOTPATH') OR exit('Access Denied!');

class AnimalModel
{
    use Model;

    protected $join = true;

    protected $table = 'Animal';
    protected $join_table = 'race';
    protected $join_condition = 'race.name';

    protected $allowedColumns =
    [
        'id',
        'race_id',
        'name',
        'habitat_id',
        'image_id',
    ];

    public function readAnimals()
    {
        //hard coded query for joins
        $query = "SELECT animal.id, animal.name, race.name AS race_name, habitat.name AS habitat_name
        FROM animal
        JOIN race on animal.race_id = race.id
        JOIN habitat ON animal.habitat_id = habitat.id";
        return $this->query($query);
    }

    public function readRaces()
    {
        //hardcoded for non-existent RaceModel
        $query = "SELECT * FROM races";
        return $this->query($query);
    }

    public function updateAnimal()
    {
        $this->insert();
    }
    

}