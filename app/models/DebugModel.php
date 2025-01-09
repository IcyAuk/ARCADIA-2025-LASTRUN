<?php

//Debug Model

//Extends the CRUD operations of core Model
//Core Model extends the Core Database Model
//Core Database Model executes queries

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class DebugModel
{
    use Model;

    protected $table = 'race';

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

}