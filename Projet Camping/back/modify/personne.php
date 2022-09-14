<?php

require '../function.php';

$bdd_connexion = bddConnect();
$personne = $_POST['personne'];

$query = $bdd_connexion -> prepare ("UPDATE PRODUIT SET personne = :personne WHERE id_produit = :id_produit");
$query -> execute([
    ":personne" => $personne,
    ":id_produit" => $_GET['id']
]);

header('Location: ../../inc/admin/hebergement_modify.php?id=' . $_GET['id']);
