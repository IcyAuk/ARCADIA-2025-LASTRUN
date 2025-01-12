<?php

namespace App\Controller;
use App\Core\CoreController;
use App\Model\Session;
use App\Model\Image;
use App\Model\Animal;

defined('ROOTPATH') OR exit('Access Denied!');

class Dashboard
{
    use CoreController;
    use Image;

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
    
    public function animals()
    {
        $animalModel = new \App\Model\Animal();
        $animals = $animalModel->getAnimals();
        $this->view('dashboard.animals',['animals'=>$animals]);
        var_dump($animals);
    }

    public function staff()
    {
        $this->view('dashboard.staff');
    }

    public function service()
    {
        $this->view('dashboard.service');
    }

    public function uploadImage($id)
    {
        $this->uploadImages($id);
    }
}