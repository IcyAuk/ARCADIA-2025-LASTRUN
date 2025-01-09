<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class AnimalLog
{
    use Model;

    protected $table = 'AnimalLog';

    protected $allowedColumns = [
        'animalReview',
        'suggestedFood',
        'suggestedFoodKilogram',
        'logDate',
        'animalReviewDetail',
        'animal_id',
        'mod_id',
    ];

    public function validate(array $data)
    {
        $this->errors = [];

        if (empty($data['animalReview'])) {
            $this->errors['animalReview'] = "Animal review is required";
        }

        if (empty($data['suggestedFood'])) {
            $this->errors['suggestedFood'] = "Suggested food is required";
        }

        if (empty($data['suggestedFoodKilogram'])) {
            $this->errors['suggestedFoodKilogram'] = "Suggested food kilogram is required";
        } elseif (!is_numeric($data['suggestedFoodKilogram'])) {
            $this->errors['suggestedFoodKilogram'] = "Suggested food kilogram must be a number";
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