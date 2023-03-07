<?php
include_once 'fonctions.php';


$dsn = 'mysql:host=localhost;dbname=netflix';
$userDbName = 'amandine';
$userPasswordDbName = '123456789';

try{
$conn = new PDO(
    $dsn,
    $userDbName,
    $userPasswordDbName,[
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
]);

} catch (PDOException $erreur) {
    echo 'Erreur de connexion :' . $erreur->getMessage();
}