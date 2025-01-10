<?php 

//i just wanted to abstract POST and GET superglobals.

/**
 * Request class
 * Gets and sets data in the POST and GET global variables
 */

namespace App\Model;

defined('ROOTPATH') OR exit('Access Denied!');

class Request
{
	
	/** check which post method was used **/
	public function method():string
	{
		return $_SERVER['REQUEST_METHOD'];
	}

	/** check if something was posted **/
	public function posted():bool
	{
		if($_SERVER['REQUEST_METHOD'] == "POST" && count($_POST) > 0)
		{
			return true;
		}

		return false;
	}


	/** get a value from the POST variable **/
	public function getFromPost(string $key = '', mixed $default = ''):mixed
	{

		if(empty($key))
		{
			return $_POST;
		}else
		if(isset($_POST[$key]))
		{
			return $_POST[$key];
		}

		return $default;
	}

	/** put data into the session **/
	public function setFromPost(string $key, mixed $value =''):void
	{
		$_POST[$key] = $value;
	}

	/** get a value from the FILES variable **/
	public function getFromFiles(string $key = '', mixed $default = ''):mixed
	{

		if(empty($key))
		{
			return $_FILES;
		}else
		if(isset($_FILES[$key]))
		{
			return $_FILES[$key];
		}

		return $default;
	}

	/** get a value from the GET variable **/
	public function getFromGet(string $key = '', mixed $default = ''):mixed
	{

		if(empty($key))
		{
			return $_GET;
		}else
		if(isset($_GET[$key]))
		{
			return $_GET[$key];
		}

		return $default;
	}

	/** get a value from the REQUEST variable **/
	public function getFromRequest(string $key, mixed $default = ''):mixed
	{

		if(isset($_REQUEST[$key]))
		{
			return $_REQUEST[$key];
		}

		return $default;
	}

	/** get all values from the REQUEST variable **/
	public function getAllRequests():mixed
	{

		return $_REQUEST;

	}


}