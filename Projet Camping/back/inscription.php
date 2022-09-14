<?php


session_start();
require './function.php';

unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['email']);
unset($_SESSION['user']);


$input_email = htmlspecialchars($_POST["email"]);
$input_prenom = htmlspecialchars($_POST["prenom"]);
$input_nom = htmlspecialchars($_POST["nom"]);
$input_confirm_password = htmlspecialchars($_POST["mdp2"]);
$username = htmlspecialchars($_POST['username']);
$input_password = htmlspecialchars($_POST["password"]);
$input_user = htmlspecialchars($_POST["user"]);
$hashedPassword = password_hash($input_password, PASSWORD_BCRYPT);

$_SESSION['nom'] = $input_nom;
$_SESSION['prenom'] = $input_prenom;
$_SESSION['email'] = $input_email;
$_SESSION['user'] = $input_user;

$bdd_connexion = bddConnect();

if($input_confirm_password != $input_password){
    $_SESSION['mdpDif'] = 'Les mots de passes doivent être identique';
    header('Location:../inc/inscription.php');
    die();
}

if(!preg_match('/[A-Z]/', $_POST["password"])){
    $_SESSION["error_uppercase_missing"] = "Votre mot de passe doit contenir au moin une majuscule";
    header('Location:../inc/inscription.php');
    die();
}

if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $_SESSION["wrong_email"] = "Adresse email invalide";
    header('Location:../inc/inscription.php');
    die();
}

if(strlen($input_password) < 8){
    $_SESSION['mdpSize'] = 'Le mot de passe doit faire au moin 8 caractère';
    header('Location:../inc/inscription.php');
    die();
}


$query = $bdd_connexion-> prepare('INSERT INTO USER(nom, prenom, email, mdp, user ) VALUES(:nom, :prenom, :email, :mdp, :user)');
$query -> execute([
    ":nom" => $input_nom,
    ":prenom" => $input_prenom,
    ":email" => $input_email,
    ":mdp" => $hashedPassword,
    ":user" => $input_user
]);

$_SESSION['connected'] = true;
$_SESSION['email'] = $input_email;
header('Location: ../index.php');
?>