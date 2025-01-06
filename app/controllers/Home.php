<?php

namespace App\Controller;
use App\Model\Request;
use App\Model\Session;

defined('ROOTPATH') OR exit('Access Denied!');

class Home
{
    public function index()
    {
        show('Home Index Echo');
        $session = new Session;
        
        $session->set(['Test1','Test2']);

        $session->logout();
        show($_SESSION[$session->getMainKey()]);
        show($_SESSION[$session->getUserKey()]);

    }
}