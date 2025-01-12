<?php

namespace App\Controller;
use App\Core\CoreController;

defined('ROOTPATH') OR exit('Access Denied!');

class Home
{
    use CoreController;

    public function index()
    {
        $this->view('home');
    }
}