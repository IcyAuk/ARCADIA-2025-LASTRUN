<?php

namespace App\Controller;
use App\Core\CoreController;

defined('ROOTPATH') OR exit('Access Denied!');

class Users
{
    use CoreController;

    public function index()
    {
        $this->view('users');
    }
}