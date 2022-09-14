<?php

require '../function.php';

$bdd_connexion = bddConnect();
$tarif = $_POST['tarif'];

$query = $bdd_connexion -> prepare ("UPDATE PRODUIT SET prix = :tarif WHERE id_produit = :id_produit");
$query -> execute([
    ":tarif" => $tarif,
    ":id_produit" => $_GET['id']
]);

header('Location: ../../inc/admin/hebergement_modify.php?id=' . $_GET['id']);
