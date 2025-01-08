<?php
echo("index");
/*
// FRONT CONTROLLER

session_start();

//Check PHP version
$minPHPVersion = '8.0';
if (phpversion() < $minPHPVersion)
{
	die("Your PHP version must be {$minPHPVersion} or higher to run this app. Your current version is " . phpversion());
}

//Autoloader for MongoDB and Dotenv
include __DIR__ . '/..' . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


//  Absolute Path to this file
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

//init
require "../app/core/init.php";

//Debug Mode
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

//Start App
$app = new App;
$app->loadController();
*/