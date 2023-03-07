<?php
include_once 'fonctions.php';


$dsn = 'mysql:host=localhost;dbname=netflix';
$userDbName = 'amandine';
$userPasswordDbName = '123456789';

try{
$conn = new PDO(
    $dsn,
    $userDbName,
    $userPasswordDbName);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $erreur) {
    echo 'Erreur de connexion :' . $erreur->getMessage();
}