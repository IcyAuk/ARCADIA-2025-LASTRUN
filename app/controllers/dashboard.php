<?php

namespace App\Controller;

use App\Controller\AnimalController;

use App\Model\Habitat;
use App\Model\Images;
use App\Model\Request;
use App\Model\Session;
use App\Core\MainController;

defined('ROOTPATH') OR exit('Access Denied!');

class Dashboard
{
    use MainController;

    public function index()
    {
        $data = [];
        $session = new Session();
        
        $this->view('dashboard');
    }

}