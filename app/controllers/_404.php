<?php

namespace App\Controller;
use App\Core\MainController;

defined('ROOTPATH') OR exit('Access Denied!');

class _404
{
    use MainController;

    public function index()
    {
        $this->view('404');
    }
}