<?php

session_start();
require '../back/function.php';

$bdd_connect = bddConnect();
$comments = strip_tags(htmlspecialchars($_POST['comment']));
$note = $_POST['note'];

$query = $bdd_connect -> prepare('SELECT * FROM USER WHERE email = :email');
$query -> execute([
    ":email" => $_SESSION['email']
]);
$account = $query -> fetchAll();



$query = $bdd_connect -> prepare('INSERT INTO AVIS(description, id_user, id_produit, note) VALUES (:description, :id_user, :id_produit, :note)');
$query -> execute([
    ":description" => $comments,
    ":id_user" => $account[0]['id_user'],
    ":id_produit" => $_GET['id'],
    ":note" => $note
]);



header('Location: ./index.php?id=' . $_GET['id']);

?>