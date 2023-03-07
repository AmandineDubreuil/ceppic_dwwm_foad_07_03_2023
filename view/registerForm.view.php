<?php
require_once './inc/fonctions.php';
require_once './inc/pdo.php';
require_once './partials/head.php';

// liaison des champs
if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    //$date = Date('yy-m-d H:i:s');
    $pwd = $_POST['pwd'];
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    // dd($pwd);

    //  if (!isset($email)) :
    // création requête
    $sql = "INSERT INTO user (login, pwd,created_at,email) VALUES (:pseudo,:pwd,now(),:email)";
    $resultat = $conn->prepare($sql);
    $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $resultat->bindValue(':pwd', $pwd, PDO::PARAM_STR);
    $resultat->bindValue(':email', $email, PDO::PARAM_STR);
    $resultat->execute();

//else :
//  echo 'L\'e-mail est déjà connu.';

// endif;
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
