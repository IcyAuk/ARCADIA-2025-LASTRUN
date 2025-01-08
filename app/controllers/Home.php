<?php

namespace App\Controller;
use App\Model\Request;
use App\Model\Session;
use App\Core\MainController;

defined('ROOTPATH') OR exit('Access Denied!');

class Home
{
    use MainController;
    public function index()
    {
        $data = [];
        $session = new Session;
        
        $this->view('home',$data);

    }
}