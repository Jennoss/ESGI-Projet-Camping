<?php

require '../function.php';

$bdd_connexion = bddConnect();
$pieces = $_POST['pieces'];

$query = $bdd_connexion -> prepare ("UPDATE PRODUIT SET pieces = :pieces WHERE id_produit = :id_produit");
$query -> execute([
    ":pieces" => $pieces,
    ":id_produit" => $_GET['id']
]);

header('Location: ../../inc/admin/hebergement_modify.php?id=' . $_GET['id']);
