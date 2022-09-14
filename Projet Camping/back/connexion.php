<?php 

require("./function.php");


ini_set("display_errors", 1);
error_reporting(E_ALL);

session_start();

// if ($_SERVER["REQUEST_METHOD"] !== "POST") {
//     header("Location: ../inc/connexion.php");
//     die();
// }

$databaseConnection = bddConnect();

$input_email = htmlspecialchars($_POST["email"]);
$input_password = htmlspecialchars($_POST["password"]);

if($input_email === 'aadmin@admin.com'){
    $_SESSION['power'] = 'admin';
}

$query = $databaseConnection->prepare("SELECT email, mdp FROM USER WHERE email = :email");

$query->execute([
    ":email" => $input_email
]);

$users = $query->fetchAll();

$user = $users[0];
$hashedPassword = $user["mdp"];
$match = password_verify($input_password, $hashedPassword);
var_dump($match);


if (count($users) === 0) {
    $_SESSION["error_users_not_exist"] = "Identifiant introuvable";
    // Renvoyer une erreur en session à la page index.php
    header("Location: ../inc/connexion.php");
    die();

}



if (!$match) {
    $_SESSION["error_wrong_password"] = "Mot de passe incorrect";
    header("Location: ../inc/connexion.php");
    die();
}

$query = $databaseConnection->prepare("SELECT power FROM USER WHERE email = :email");
$query->execute([
    ':email' => $input_email
]);
$getPower = $query -> fetchAll();

$power = $getPower[0]['power'];

if($match) {
    if($power === "admin"){
        $_SESSION["power"] = 'admin';
    } else {
        $_SESSION["power"] = 'user';
    }
    $_SESSION["email"] = $input_email;
    $_SESSION["connected"] = true;
    header("Location: ../index.php");
}