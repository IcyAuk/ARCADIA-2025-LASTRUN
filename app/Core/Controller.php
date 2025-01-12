<?php 

namespace App\Core;

defined('ROOTPATH') OR exit('Access Denied!');

Trait CoreController
{

	public function view($name, $data = [])
	{

		if(!empty($data))
			extract($data);

		$filename = "../app/views/".$name.".view.php";
		if(file_exists($filename))
		{
			require $filename;
		}else{

			$filename = "../app/views/404.view.php";
			require $filename;
		}
	}
	public function loadJS($name)
	{
		$filename = "../app/JavaScript/".$name.".js";
		if(file_exists($filename))
		{
			echo"<script>";
			require $filename;
			echo"</script>";
		}
		else
		{trigger_error("Le Javascript demandé n'éxiste pas : ". $name .".js", E_USER_ERROR);}
	}
}