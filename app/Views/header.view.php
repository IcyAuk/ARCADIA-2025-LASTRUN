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
</head>

<body class="container">
    <header>
        <nav>
            <div>Arcadia Zoo</div>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/services">Services</a></li>
                <li><a href="/contact">Nous Contacter</a></li>
            </ul>
            <ul>

                <?php if($session->is_logged_in()):?>
                <li><a href="/logout">déconnexion</a></li>
                <?php else: ?>
                <li><a href="/login">Login</a></li>
                <?php endif; ?>

            </ul>
            <?php if($session->is_logged_in()):?>
            <ul>
                <li><a href="/dashboard">dashboard</a></li>
            </ul>
            <?php endif; ?>
        </nav>
    </header>
    <main>