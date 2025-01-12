<?php

namespace App\Controller;
use App\Core\CoreController;
use App\Model\Session;

defined('ROOTPATH') OR exit('Access Denied!');

class Dashboard
{
    use CoreController;

    public function __construct()
    {
        $ses = new Session;
        if(!$ses->is_logged_in())
        {
            redirect('login');
        }
    }

    public function index()
    {
        $this->view('dashboard');
    }
}