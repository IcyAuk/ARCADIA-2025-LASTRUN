<?php

namespace App\Controller;

defined('ROOTPATH') OR exit('Access Denied!');


use App\Core\MainController;

class _404
{
    use MainController;
    public function index()
    {
        
        $this->view('404');

    }
}