<?php
require_once './inc/fonctions.php';
require_once './inc/pdo.php';
require_once './partials/head.php';

$error = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') :

    //traitement des failles XSS
    foreach ($_POST as $key => $value) :

        $_POST[$key] = checkXSSPostValue($value);

        // vérifie champs obligatoires vides
        $error = checkEmptyValue($value, $key, $error);
    endforeach;

    // liaison des champs
    $pseudo = $_POST['pseudo'];

    $email = $_POST['email'];
    //validation format e-mail
    $error = checkEmail($_POST['email'], 'email', $error);


    $pwd = $_POST['pwd'];
    //validation format mdp
    $error = checkPwdValid($_POST['pwd'], 'pwd', $error);
    // validation confirmation mdp
    $error = checkPwdConfirm($_POST['pwd'], $_POST['confPwd'], 'confPwd', $error);
    // hachage mdp
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

    if (empty($error)) : ?>
        <div class="reussi">Votre compte est bien enregistré !</div>

<?php


        // création requête
        $sql = "INSERT INTO user (login, pwd,created_at,email) VALUES (:pseudo,:pwd,now(),:email)";
        $resultat = $conn->prepare($sql);
        $resultat->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $resultat->bindValue(':pwd', $pwd, PDO::PARAM_STR);
        $resultat->bindValue(':email', $email, PDO::PARAM_STR);
        $resultat->execute();
    else :
        dbug($error);
    endif;

endif;
?>


<form method="post" class="enregistrement">
    <div>
        <label for="pseudo">Pseudo</label>
        <span class="error"><?= isset($error['pseudo']) ? $error['pseudo'] : "" ?></span>
        <input type="text" name="pseudo" id="pseudo">
    </div>
    <div>
        <label for="email">E-mail</label>
        <span class="error"><?= isset($error['email']) ? $error['email'] : "" ?></span>
        <input type="email" name="email" id="email" required>
    </div>
    <div>
        <label for="pwd">Mot de passe</label>
        <span class="error"><?= isset($error['pwd']) ? $error['pwd'] : "" ?></span>
        <input type="password" name="pwd" id="pwd" required>
    </div>
    <div>
        <label for="confPwd">Confirmation du Mot de passe</label>
        <span class="error"><?= isset($error['confPwd']) ? $error['confPwd'] : "" ?></span>
        <input type="password" name="confPwd" id="confPwd" required>
    </div>

    <input type="submit" value="Enregistrement">
</form>


<?php
require_once './partials/foot.php';
