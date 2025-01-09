<?php

namespace App\Controller;

use App\Model\Animal as AnimalModel;
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
        
        $this->view('dashboard', $data);
    }

    public function listAnimals()
    {
        $data = [];
        $animal = new AnimalModel();
        $data['animals'] = $animal->findAll() ? $animal : [];
        
        $this->view('dashboard.animal.list', $data);
    }

    public function createAnimal()
    {
        $data = [];

        $req = new Request();
        $ses = new Session();
        $ses->checkLevel(['Admin']) ? : redirect('login');

        if ($req->posted())
        {
            $animal = new AnimalModel();
            $habitat = new Habitat();

            $animalData = $req->getFromPost();

            // Validate habitat
            if (!$habitat->first(['id' => $animalData['habitat_id']]))
            {
                $animal->errors['habitat_id'] = "Invalid habitat selected";
            }

            if (empty($animal->errors) && $animal->validate($animalData))
            {
                $animal->insert($animalData);
                redirect('dashboard/listAnimals');
            }

            $data['errors'] = $animal->errors;
        }

        $data['habitats'] = (new Habitat())->findAll();

        $this->view('dashboard.animal.create', $data);
    }
}