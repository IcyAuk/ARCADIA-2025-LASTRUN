<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class AnimalFoodLog
{
    use Model;

    protected $table = 'AnimalFoodLog';

    protected $allowedColumns = [
        'givenFood',
        'givenFoodKilogram',
        'logDate',
        'animal_id',
        'mod_id',
    ];

    public function validate(array $data)
    {
        $this->errors = [];

        if (empty($data['givenFood'])) {
            $this->errors['givenFood'] = "Given food is required";
        }

        if (empty($data['givenFoodKilogram'])) {
            $this->errors['givenFoodKilogram'] = "Given food kilogram is required";
        } elseif (!is_numeric($data['givenFoodKilogram'])) {
            $this->errors['givenFoodKilogram'] = "Given food kilogram must be a number";
        }

        if (empty($data['animal_id'])) {
            $this->errors['animal_id'] = "Animal ID is required";
        }

        if (empty($data['mod_id'])) {
            $this->errors['mod_id'] = "Modifier ID is required";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}