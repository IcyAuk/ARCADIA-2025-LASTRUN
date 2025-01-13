<?php

namespace App\Controller;
use App\Core\CoreController;
use App\Controller\Register;
use App\Model\Session;
use App\Model\Staff;
use App\Model\Request;
use App\Model\Image;
use App\Model\Habitat;
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
        $ses = new Session();
        $ses->checkLevel(['Admin']) ? : redirect('dashboard');

        $animalModel = new Animal();
        $animals = $animalModel->getAnimals();
        $habitatModel = new Habitat();
        $habitats = $habitatModel->getHabitats();

        $this->view('dashboard.header');

        $this->view('dashboard.animals',['animals'=>$animals,'habitats'=>$habitats]);
        $this->loadJS('dashboard.animals');

        $this->view('dashboard.footer');
    }

    public function createAnimal()
    {
        $animalModel = new Animal();
        $name = $_POST['name'];
        $race = $_POST['race'];
        $habitatId = $_POST['habitat'];
        $animalModel->createAnimal($name, $race, $habitatId);
        redirect('/dashboard/animals');
    }

    public function updateAnimal($id)
    {
        $animalModel = new Animal();
        $name = $_POST['name'];
        $habitatId = $_POST['habitat'];
        $animalModel->updateAnimal($id, $name, $habitatId);
        redirect('/dashboard/animals');
    }

    public function deleteAnimal($id)
    {
        $animalModel = new Animal();
        $result = $animalModel->delete($id); //child model method, not core model
        echo json_encode(['success' => $result]);

    }

    public function staff()
    {
        $ses = new Session();
        $ses->checkLevel(['Admin']) ? : redirect('dashboard');
        $staffModel = new Staff();
        $staff = $staffModel->getStaffMembers();
        $level = $staffModel->allowedLevels;

        $this->view('dashboard.header');

        $this->view('dashboard.staff',['staff'=>$staff,'level'=>$level]);
        $this->loadJS('dashboard.staff');

        $this->view('dashboard.footer');
    }

    public function createStaffMember()
    {
        $Controller = new Register();
        $Controller->createStaffMember();
    }

    public function deleteStaffMember($id)
    {
        $staffModel = new Staff();
        $result = $staffModel->deleteStaffMember($id);
        echo json_encode(['success' => $result]);
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