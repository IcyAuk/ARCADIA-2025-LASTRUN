<?php 

namespace App\Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use App\Model\Session;
use App\Core\MainController;

/**
 * Logout class
 */
class Logout
{
    use MainController;

    public function index()
    {
        $ses = new Session();
        $ses->destroy();

        redirect('login');
    }
}