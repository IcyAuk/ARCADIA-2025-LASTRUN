<?php

namespace App\Controller;

use App\Core\AJAX;
use App\Core\MainController;
use App\Model\AnimalModel;

class Animal
{
    use MainController;
    public function index()
    {
        $this->view('dashboard');
    }

    public function createAnimal()
    {
        $data = [];
        $AnimalModel = new AnimalModel();
        $ajax = new AJAX();

        $this->view('dashboard.animal.create', $data);
    }

    public function readAnimal()
    {
        $AnimalModel = new AnimalModel();
        $ajax = new AJAX();
        $animals = $AnimalModel->readAnimals();

        $data['animals'] = $ajax->returnEncode($animals, 'No animals found');

        $this->view('dashboard.animal.list', $data);
    }

}