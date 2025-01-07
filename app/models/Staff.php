<?php

namespace App\Model;
use App\Core\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Staff
{
    use Model;
	protected $table = 'test_table';

	protected $allowedColumns = [
		
		'name',
		'email',
		'password',
		'role',
	];

	public function validate($data)
	{
		$this->errors = [];

		if(empty($data['email']))
		{
			$this->errors['email'] = "Email is required";
		}else
		if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL))
		{
			$this->errors['email'] = "Email is not valid";
		}

		if(empty($data['name']))
		{
			$this->errors['name'] = "Username is required";
		}else
		if(!preg_match("/^[a-zA-Z]+$/",$data["name"]))
		{
			$this->errors['name'] = "Username can only have letters with no white space";
		}
		
		if(empty($data['password']))
		{
			$this->errors['password'] = "Password is required";
		}

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}