<?php

namespace App\Model;
use App\Core\Model;
use App\Model\Session;

defined('ROOTPATH') OR exit('Access Denied!');

class Staff
{
    use Model;
	protected $table = 'Staff';

	protected $allowedColumns = [
		
		'level',
		'firstName',
		'lastName',
		'email',
		'passwordHash',

	];

	public function validate(array $data)
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

		if(empty($data['firstName']))
		{
			$this->errors['firstName'] = "firstName is required";
		}else
		if(!preg_match("/^[a-zA-Z]+$/",$data["firstName"]))
		{
			$this->errors['firstName'] = "firstName can only have letters with no white space";
		}

		if(empty($data['lastName']))
		{
			$this->errors['lastName'] = "lastName is required";
		}else
		if(!preg_match("/^[a-zA-Z]+$/",$data["lastName"]))
		{
			$this->errors['lastName'] = "lastName can only have letters with no white space";
		}
		
		if(empty($data['password']))
		{
			$this->errors['password'] = "Password is required";
		}

		if(empty($data['level']))
        {
            $this->errors['level'] = "Level is required";
        }else
        if(!in_array($data['level'], ['Vet', 'Mod', 'Admin']))
        {
            $this->errors['level'] = "Invalid level selected";
        }

		if(empty($this->errors))
		{
			return true;
		}

		return false;
	}
}