<?php
echo($_SERVER['SERVER_NAME'] );
echo("</br>");
echo("front controller current dir: ".__DIR__);
echo("</br>");

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// FRONT CONTROLLER

session_start();

//Check PHP version
$minPHPVersion = '8.0';
if (phpversion() < $minPHPVersion)
{
	die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is " . phpversion());
}

try{

	//Autoloader for MongoDB and Dotenv
	require __DIR__ . '/..' . "/vendor/autoload.php";
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
	$dotenv->load();
}catch(Exception)
{
	echo("Error loading Dotenv");
}

//  Absolute Path to this file
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
echo(ROOTPATH);
echo("</br>");

//init
require "../app/core/init.php";

//Debug Mode
//DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

//Start App
$app = new App\Core\App();
$app->loadController();