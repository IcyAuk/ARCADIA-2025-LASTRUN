<?php

namespace App\Model;

use App\Core\Model;
use App\Interfaces\IModel;

defined('ROOTPATH') OR exit('Access Denied!');

class HabitatModel
{
    use Model;

    protected $join = true;

    protected $table = 'Habitat';
    protected $join_table = 'race';
    protected $join_condition = 'race.name';

    protected $allowedColumns =
    [
        'id',
        'name',
    ];

}