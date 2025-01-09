<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Contact
{
    use Model;

    protected $table = 'Contact';

    protected $allowedColumns = [
        'title',
        'description',
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

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}