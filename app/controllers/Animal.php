<?php

namespace App\Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use App\Model\Animal as AnimalModel;
use App\Model\Habitat;
use App\Model\Images;
use App\Model\Request;
use App\Model\Session;
use App\Core\MainController;

class Animal
{
    use MainController;

    public function index()
    {
        
    }

    public function create()
    {
        $data = [];

        $req = new Request;
        $ses = new Session();
        $ses->checkLevel(['Admin']) ? : redirect('login');

        if ($req->posted())
        {
            $animal = new AnimalModel();
            $habitat = new Habitat();
            $image = new Images();

            $animalData = $req->getFromPost();

            // Validate habitat
            if (!$habitat->first(['id' => $animalData['habitat_id']]))
            {
                $animal->errors['habitat_id'] = "Invalid habitat selected";
            }

            // Validate image
            if (!$image->first(['id' => $animalData['image_id']]))
            {
                $animal->errors['image_id'] = "Invalid image selected";
            }

            if (empty($animal->errors) && $animal->validate($animalData))
            {
                $animal->insert($animalData);
                redirect('animal/list');
            }

            $data['errors'] = $animal->errors;
        }

        $data['habitats'] = (new Habitat())->findAll();
        $data['images'] = (new Images())->findAll();

        $this->view('animal.create', $data);
    }
}