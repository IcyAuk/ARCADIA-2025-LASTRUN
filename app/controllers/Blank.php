<?php

namespace Blank;
use App\Core\MainController;

defined('ROOTPATH') OR exit('Access Denied!');

class Blank
{
    use MainController;

    public function index()
    {
        $data = [];

        $this->view('blank',$data);
    }
}