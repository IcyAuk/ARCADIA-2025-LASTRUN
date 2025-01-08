<?php
require __DIR__ . "/vendor/autoload.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
use Exception;
use MongoDB\Client;

$uri = $_ENV['DATABASE_MONGODB_URI'];
$client = new MongoDB\Client($uri);
try {
    
    $client->selectDatabase('admin')->command(['ping' => 1]);
} catch (Exception $e) {
    printf($e->getMessage());
}