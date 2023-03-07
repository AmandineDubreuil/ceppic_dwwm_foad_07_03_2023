<?php
require_once './inc/fonctions.php';
require_once './inc/pdo.php';

$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$sql = "INSERT INTO user ('id_user','login','pwd','created_at','email') VALUES (null, '$pseudo','$pwd','','$email')";

?>


<form method="post" class="enregistrement">
    <div>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">
    </div>
    <div>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" id="pwd" required>
    </div>
    <div>
        <label for="confPwd">Confirmation du Mot de passe</label>
        <input type="password" name="confPwd" id="confPwd" required>
    </div>

    <input type="submit" value="Connexion">
</form>