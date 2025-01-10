<?php

//Declare namespace
//Use core Controller
//Use sibling Model

namespace App\Controller;
use App\Core\MainController; //view Controller
use App\Model\DebugModel as DebugModel;

defined('ROOTPATH') OR exit('Access Denied!');

class Debug
{
    use MainController;

    public function index()
    //call functions from the eventual Models, pass method returns to $data
    {
        $data = [];

        //Link to sibling Model that is tied to database
        $model = new DebugModel();

        $data['race'] = $model->readAll();

        //render appropriate view. Can pass data array.
        $this->view('debug',$data);
    }

    public function test()
    {
        echo "Test";
    }
}