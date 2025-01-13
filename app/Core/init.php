<?php 
//CLASS AUTOLOADER

defined('ROOTPATH') OR exit('Access Denied!');


spl_autoload_register(function($classname){

	$classname = explode("\\", $classname);
	$classname = end($classname);
	$modelPath = "../app/models/".ucfirst(strtolower($classname)).".php";
	$interfacePath = "../app/interfaces/".uctwo(strtolower($classname)).".php";
	
    if (file_exists($modelPath)) {
        require $modelPath;
    } elseif (file_exists($interfacePath)) {
        require $interfacePath;
    } else {
        throw new Exception("Unable to load $classname.");
    }
});

require 'config.php';
require 'functions.php';

require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';

function uctwo(string $string) : string
{
    $firstTwo = strtoupper(substr($string, 0, 2));
    $remaining = substr($string, 2);

    return $firstTwo . $remaining;
}