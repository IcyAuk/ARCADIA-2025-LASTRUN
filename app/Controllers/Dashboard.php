<?php

namespace App\Controller;
use App\Core\CoreController;
use App\Model\Session;
use App\Model\Image;
use App\Model\Habitat;

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
        $habitatModel = new \App\Model\Habitat();
        $habitats = $habitatModel->getHabitats();

        $this->view('dashboard.header');

        $this->view('dashboard.animals',['animals'=>$animals,'habitats'=>$habitats]);
        $this->loadJS('dashboard.animals');

        $this->view('dashboard.footer');
    }

    public function updateAnimal($id)
    {
        $animalModel = new \App\Model\Animal();
        $name = $_POST['name'];
        $habitatId = $_POST['habitat'];
        $animalModel->updateAnimal($id, $name, $habitatId);
        redirect('/dashboard/animals');
    }

    public function deleteAnimal($id)
    {
        $animalModel = new \App\Model\Animal();
        $result = $animalModel->delete($id);
        echo json_encode(['success' => $result]);

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