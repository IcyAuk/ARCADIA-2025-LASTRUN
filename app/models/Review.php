<?php

namespace App\Model;

use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Review
{
    use Model;

    protected $table = 'Review';

    protected $allowedColumns = [
        'status',
        'reviewDate',
    ];

    public $id;
    public $status;
    public $reviewDate;

    public function validate(array $data)
    {
        $this->errors = [];

        if (empty($data['status'])) {
            $this->errors['status'] = "Status is required";
        } else if (!in_array($data['status'], ['Pending', 'Approved', 'Rejected'])) {
            $this->errors['status'] = "Invalid status selected";
        }

        if (empty($this->errors)) {
            return true;
        }

        return false;
    }
}