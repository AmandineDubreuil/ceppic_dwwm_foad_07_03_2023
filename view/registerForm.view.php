<?php
require_once './inc/fonctions.php';
require_once './inc/pdo.php';

// liaison des champs
$pseudo = $_POST['pseudo'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

// création requête
$sql = "INSERT INTO user ('id_user','login','pwd','created_at','email') VALUES (null, ':pseudo',':pwd','',':email')";
$resultat = $conn->prepare($sql);
$resultat ->bindParam(':pseudo', $pseudo);
$resultat ->bindParam(':pwd', $pwd);
$resultat ->bindParam(':email', $email);


//exécution requête
if ($resultat->execute()) :
echo 'Les données ont été enregistrées avec succès';

else :
    echo "Erreur : ". $erreur->getMessage();

endif;

//fermer connexion
$conn = null;

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