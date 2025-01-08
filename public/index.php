<?php
echo("index start");

// FRONT CONTROLLER

session_start();

//Check PHP version
$minPHPVersion = '8.0';
if (phpversion() < $minPHPVersion)
{
	die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is " . phpversion());
}

//Autoloader for MongoDB and Dotenv
require __DIR__ . '/..' . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
var_dump($dotenv);


//  Absolute Path to this file
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);
var_dump(ROOTPATH);
var_dump(__DIR__);

//init
require "../app/core/init.php";

//Debug Mode
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

//Start App
$app = new App;
$app->loadController();
var_dump($app);