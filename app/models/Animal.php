<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Animal
{
    use Model;

    protected $table = 'Animal';

    protected $allowedColumns = [
        'id',
        'name',
        'race',
        'habitat_id',
        'image_id',
    ];

    public $id;
    public $name;
    public $race;
    public $habitat_id;
    public $image_id;

    public function validate(array $data)
    {
        $this->errors = [];

        if (empty($data['name'])) {
            $this->errors['name'] = "Name is required";
        }

        if (empty($data['race'])) {
            $this->errors['race'] = "Race is required";
        }

        if (empty($data['habitat_id'])) {
            $this->errors['habitat_id'] = "Habitat ID is required";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}