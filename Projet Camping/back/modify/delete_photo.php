<?php

require '../function.php';

$bdd_connexion = bddConnect();
var_dump($_GET['id_photo']);
var_dump($_GET['image']);
var_dump($_GET['id']);

$query = $bdd_connexion -> prepare ('DELETE FROM PHOTO WHERE id_photo = :id_photo');
$query -> execute([
    ":id_photo" => $_GET['id_photo']
]);


header('Location: ../../inc/admin/hebergement_modify.php?id=' . $_GET['id']);
