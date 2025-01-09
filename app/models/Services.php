<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Services
{
    use Model;

    protected $table = 'Services';

    protected $allowedColumns = [
        'title',
        'description',
        'image_id',
    ];

    public function validate(array $data)
    {
        $this->errors = [];

        if (empty($data['title'])) {
            $this->errors['title'] = "Title is required";
        }

        if (empty($data['description'])) {
            $this->errors['description'] = "Description is required";
        }

        if (empty($data['image_id'])) {
            $this->errors['image_id'] = "Image ID is required";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}