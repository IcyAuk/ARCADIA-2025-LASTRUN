<?php

namespace App\Controller;
use App\Core\CoreController;
use App\Model\Staff as StaffModel;

defined('ROOTPATH') OR exit('Access Denied!');

class Staff
{
    use CoreController;
    public function index()
    {

    }
    
    public function getStaffMembers()
    {
        $Model = new StaffModel;
        $staffMembers = $Model->getStaffMembers();
        return json_encode($staffMembers);
    }
}