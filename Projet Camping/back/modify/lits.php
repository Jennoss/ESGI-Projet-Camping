<?php

require '../function.php';

$bdd_connexion = bddConnect();
$lits = $_POST['lits'];

$query = $bdd_connexion -> prepare ("UPDATE PRODUIT SET lits = :lits WHERE id_produit = :id_produit");
$query -> execute([
    ":lits" => $lits,
    ":id_produit" => $_GET['id']
]);

header('Location: ../../inc/admin/hebergement_modify.php?id=' . $_GET['id']);
