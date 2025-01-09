<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Days
{
    use Model;

    protected $table = 'Days';

    protected $allowedColumns = [
        'day',
        'openTime',
        'closeTime',
        'isOpen',
    ];

    public function validate(array $data)
    {
        $this->errors = [];

        if (empty($data['day'])) {
            $this->errors['day'] = "Day is required";
        } elseif (!in_array($data['day'], ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])) {
            $this->errors['day'] = "Invalid day selected";
        }

        if (empty($data['openTime'])) {
            $this->errors['openTime'] = "Open time is required";
        }

        if (empty($data['closeTime'])) {
            $this->errors['closeTime'] = "Close time is required";
        }

        if (!isset($data['isOpen'])) {
            $this->errors['isOpen'] = "Open status is required";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}