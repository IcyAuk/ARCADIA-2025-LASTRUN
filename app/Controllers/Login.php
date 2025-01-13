<?php 

namespace App\Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use App\Core\CoreController;
use App\Model\Staff;
use App\Model\Request;
use App\Model\Session;

/**
 * Login class
 */
class Login
{
    use CoreController;
	public function index()
	{
		$data = [];

		$req = new Request;
		if($req->posted())
		{
			$user = new Staff();

			$email = $req->getFromPost('email');
			$password = $req->getFromPost('password');

			if($row = $user->first(['email'=>$email]))
			{
				//check if password is correct
				if(password_verify($password, $row->passwordHash))
				{
					//auth
					$ses = new Session;
					$ses->auth($row);
					
					
					redirect('dashboard');
					session_regenerate_id(true);
				}
			}
			$user->errors['email'] = "Wrong credentials";
			$data['errors'] = $user->errors;
		}

		$this->view('login',$data);
	}

}