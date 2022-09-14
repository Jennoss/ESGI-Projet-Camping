<?php

require '../function.php';

$bdd_connexion = bddConnect();
$location = $_POST['location'];
var_dump($location);

$query = $bdd_connexion -> prepare ("UPDATE PRODUIT SET type = :type WHERE id_produit = :id_produit");
$query -> execute([
    ":type" => $location,
    ":id_produit" => $_GET['id']
]);

header('Location: ../../inc/admin/hebergement_modify.php?id=' . $_GET['id']);
