<?php 

namespace App\Controller;

defined('ROOTPATH') OR exit('Access Denied!');

use App\Core\CoreController;
use App\Model\Staff;
use App\Model\Request;
use App\Model\Session;


/**
 * Register class
 */
class Register
{
	use CoreController;
	public function index()
	{
		redirect('login');
	}
	public function createStaffMember()
	{
		$data = [];

		$req = new Request;
		$ses = new Session();
		$ses->checkLevel(['Admin']) ? : redirect('login');

		if($req->posted())
		{
			$user = new Staff();
			$email = $req->getFromPost('email');

            // Check if email already exists
            if($user->first(['email' => $email]))
            {
                $user->errors['email'] = "Email is already taken";
            }


			if(empty($user->errors) && $user->validate($req->getFromPost()))
			{
				//hash the password
				$password = password_hash($req->getFromPost('password'),PASSWORD_DEFAULT);
				$req->setFromPost('passwordHash',$password);

				$postData = $req->getFromPost();
                unset($postData['password']);

				$user->insert($postData);
				redirect('dashboard/staff');
			}
			$data['errors'] = $user->errors;
		}
	}

}