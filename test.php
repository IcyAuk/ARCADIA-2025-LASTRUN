<?php

$host = 'localhost';
$port = '';
$dbname = 'arcadia';
$username = 'root';
$password = '';
$charset = ''; // Character set
$dsn = "mysql:host=$host;dbname=$dbname;user=$username;password=$password";

try{

    $pdo = new \PDO($dsn);
    $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
    return $pdo;
}catch(\PDOException $e)
{
    $e->getMessage();
}
