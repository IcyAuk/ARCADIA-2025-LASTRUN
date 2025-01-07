<?php 

namespace App\Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use App\Model\Staff;
use App\Model\Request;
use App\Core\MainController;


/**
 * Register class
 */
class Register
{
	use MainController;

	public function index()
	{
		$data = [];

		$req = new Request;
		if($req->posted())
		{
			$user = new Staff();
			if($user->validate($req->getFromPost()))
			{
				//save to database
				$password = password_hash($req->getFromPost('password'),PASSWORD_DEFAULT);
				$req->setFromPost('password',$password);

				$user->insert($req->getFromPost());
				redirect('login');
			}
			$data['errors'] = $user->errors;
		}


		$this->view('register',$data);
	}

}