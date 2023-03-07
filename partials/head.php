<?php session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NeetFix</title>
    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
    <header class="header">
        <h1>Films</h1>
        <nav>
            <ul>
                <?php
                if (isset($_SESSION['login'])) {
                ?>

                    <li><a href="./login/deconnexion.php">Deconnexion</a></li>
                <?php
                } else {
                ?>
                    <li><a href="./login/index.login.php">Connexion</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>