<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Images
{
    use Model;

    protected $table = 'Images';

    protected $allowedColumns = [
        'path',
        'uploadDate',
    ];

    public function validate(array $data)
    {
        $this->errors = [];

        if (empty($data['path'])) {
            $this->errors['path'] = "Path is required";
        }

        if (empty($data['uploadDate'])) {
            $this->errors['uploadDate'] = "Upload date is required";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}