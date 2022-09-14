<?php

require '../function.php';

$bdd_connexion = bddConnect();
$superficie = $_POST['superficie'];

$query = $bdd_connexion -> prepare ("UPDATE PRODUIT SET superficie = :superficie WHERE id_produit = :id_produit");
$query -> execute([
    ":superficie" => $superficie,
    ":id_produit" => $_GET['id']
]);

header('Location: ../../inc/admin/hebergement_modify.php?id=' . $_GET['id']);
