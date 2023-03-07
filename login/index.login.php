<?php
session_start();

require_once '../inc/fonctions.php';
require_once '../inc/pdo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $email = htmlentities(trim($_POST['email']));
    $pwd = trim($_POST['pwd']);

    $requete = 'SELECT * FROM user WHERE email = :email';
    $resultat = $conn->prepare($requete);
    $resultat->bindValue(':email', $email, PDO::PARAM_STR);
    $resultat->execute();
    $resultatEmail = $resultat->fetch();

    dbug($resultatEmail);
  
    if (!$resultatEmail) :
        echo 'Votre email n\'est pas enregistrée comme utilisateur de notre site.';
        exit();
    else :
        // if (password_verify($pwd, $resultatEmail['pwd'])) :
        $_SESSION['login'] = true;

        header('location: http://localhost/movies');
        // else :
        echo 'Votre mot de passe n\'est pas valide';
    // endif;

    endif;


endif;

?>

<link rel="stylesheet" href="../assets/css/style.css">

<form method="post" class="connexion">
    <div>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="pwd">Mot de passe</label>
        <input type="password" name="pwd" id="pwd" required>
    </div>
    <input type="submit" value="Connexion">
</form>