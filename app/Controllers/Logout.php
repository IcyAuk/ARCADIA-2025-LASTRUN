<?php 

namespace App\Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use App\Core\CoreController;
use App\Model\Session;

/**
 * Logout class
 */
class Logout
{
    use CoreController;

    public function index()
    {
        $ses = new Session();
        $ses->destroy();

        redirect('login');
    }
}