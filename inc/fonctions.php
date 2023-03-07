<?php

//echo 'test';

function dbug($valeur)
{
    echo "<pre style='background-color:black;color:white;padding: 15px;overflow:auto;height:300px;'>";
    var_dump($valeur);
    echo "</pre>";
}


function dd($valeur)
{
    echo "<pre style='background-color:black;color:white;padding: 15px;overflow:auto;height:300px;'>";
    var_dump($valeur);
    echo "</pre>";
    die();
}
/****************** 
FORMULAIRES
 ******************/


/**
 * checkXSSPostValue
 * 
 * Cette fonction sert à vérifier l'intégrité de la variable post transmise (faille XSS).
 * 
 * @param  mixed $postEntrie : entrée de formulaire à vérifier
 * @return mixed variable post nettoyée de ses tags
 */
function checkXSSPostValue($postEntrie)
{
    $postEntrie = strip_tags($postEntrie);
    return $postEntrie;
}

// vérif si champs est vide


/**
 * checkEmptyValue
 *
 * Cette fonction permet de vérifier si un champs obligatoire est vide. 
 * 
 * @param  mixed $postEntrie : entrée de formulaire à vérifier
 * @param  string $key : name HTML(index post de mon entrée)
 * @param  array $error : tableau d'erreurs de mon formulaire
 * @return array $error : retourne le tableau d'erreurs modifié si le champs est vide
 * @version 1.0.0
 * @author Cemoi
 */
function checkEmptyValue($postEntrie, $key, $error)
{
    if (empty($postEntrie)) :
        $error[$key] = "Le champ $key est vide.";

    endif;
    return $error;
}

//validation mail

/**
 * checkEmail
 * 
 * Cette fonction permet de vérifier si le format de l'e-mail est valide.
 *
 * @param  string $emailEntrie : champs e-mail à vérifier
 * @param  string $key :name HTML(index post de mon entrée)
 * @param  array $error : tableau d'erreurs de mon formulaire
 * @return array $error : retourne le tableau d'erreurs modifié si le champs est vide
 */
function checkEmail($postEntrie, $key, $error)
{
    if (!filter_var($postEntrie, FILTER_VALIDATE_EMAIL)) :
        $error[$key] = 'L\'e-mail est invalide".';
        return $error;
    endif;
}

/**
 * checkPwdValid
 * 
 * Cette fonction permet de savoir si le mot de passe correspond aux critères de sécurité.
 *
 * @param  string $postEntrie : champs e-mail à vérifier
 * @param  string $key :name HTML(index post de mon entrée)
 * @param  array $error : tableau d'erreurs de mon formulaire
 * @return array $error : retourne le tableau d'erreurs modifié si le champs est vide
 */
function checkPwdValid($postEntrie, $key, $error)
{
    $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

    if (!preg_match($password_regex, $postEntrie)) :
        $error[$key] = 'Le mot de passe doit comporter au moins 8 caractères, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.';
    return $error;

    endif;
}

/**
 * checkPwdConfirm
 *
 * Cette fonction permet de vérifier si les mots de passe sont identiques 
 * 
 * @param  mixed $postPwd : entrée de formulaire à vérifier
 *  @param  mixed $postConfPwd : entrée de formulaire à vérifier

 * @param  string $key : name HTML(index post de mon entrée)
 * @param  array $error : tableau d'erreurs de mon formulaire
 * @return array $error : retourne le tableau d'erreurs modifié si les mots de passe ne sont pas identiques
 * @version 1.0.0
 * @author Cemoi
 */
function checkPwdConfirm($postPwd, $postConfPwd, $key, $error)
{
    if ($postPwd !== $postConfPwd) :
        $error[$key] = "Les deux mots de passe ne sont pas identiques.";
    return $error;

    endif;
}
