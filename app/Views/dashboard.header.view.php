<?php 
use App\Model\Session;
$session = new Session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="container">
    <header>
        <nav>
            <div>Dashboard : </div>
            <div>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/logout">Logout</a></li>
                </ul>
            </div>
        </nav>
        <a href="/dashboard/animals" id="animals" class="button">Gérer les animaux</a>
        <a href="/dashboard/staff" id="staff" class="button">Gérer l'administration</a>
    </header>
    <main>