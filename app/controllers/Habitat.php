<?php

namespace App\Controller;

use App\Core\AJAX;
use App\Core\MainController;
use App\Model\HabitatModel;

class Habitat
{
    use MainController;
    public function index()
    {
        $this->view('dashboard');
    }

    public function readHabitat()
    {
        $HabitatModel = new HabitatModel();
        $ajax = new AJAX();
        $Habitats = $HabitatModel->readAll();

        $data['Habitats'] = $Habitats ? $ajax->encode(true, $Habitats) : $ajax->encode(false, [], 'No Habitats found');

        $this->view('dashboard.Habitat.list', $data);
    }

}