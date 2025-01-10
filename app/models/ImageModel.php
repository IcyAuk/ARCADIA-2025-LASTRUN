<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class ImageModel
{
    use Model;

    protected $table = 'images';

    protected $allowedColumns = [
        'id',
        'path',
    ];

    public $id;
    public $name;
    public $race;
    public $habitat_id;
    public $image_id;

}