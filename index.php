<?php

//FRONTEND MOCKUP BRANCH
//FRONT CONTROLLER IS DISABLED
//DATABASE CONNECTION UNAVAILABLE
//.ENV MISSING

// FRONT CONTROLLER
// LOAD COMPOSER AND DOTENV LIBRARY

/*
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

*/

// LOAD DATABASE
require_once("core/Model.php");
//Model::openDatabaseConnection();

require_once("app/view/mockup/bootstrapHome.php");
