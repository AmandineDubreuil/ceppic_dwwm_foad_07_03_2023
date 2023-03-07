<?php
require_once './inc/fonctions.php';
require_once './inc/pdo.php';
require_once './partials/head.php';

// liaison des champs
if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $date = Date('yy-m-d H:i:s');
    $pwd = $_POST['pwd'];

    // création requête
    $sql = "INSERT INTO user ('id_user','login','pwd','created_at','email') VALUES (null, ':pseudo',':pwd',':date',':email')";
    $resultat = $conn->prepare($sql);
    $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $resultat->bindValue(':pwd', $pwd, PDO::PARAM_STR);
    $resultat->bindValue(':date', $date);
    $resultat->bindValue(':email', $email, PDO::PARAM_STR);
   // $resultatSql = array($resultat);

dd();
    //exécution requête
    if ($resultat->execute()) :
        echo 'Les données ont été enregistrées avec succès';

    else :
        echo "Erreur : " . $erreur->getMessage();

    endif;

    //fermer connexion
   // $conn = null;

endif;
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

    <input type="submit" value="Enregistrement">
</form>


<?php
require_once './partials/foot.php';