<?php

namespace App\Controller;
use App\Core\CoreController;

defined('ROOTPATH') OR exit('Access Denied!');

class _404
{
    use CoreController;

    public function index()
    {
        $this->view('404');
    }
}