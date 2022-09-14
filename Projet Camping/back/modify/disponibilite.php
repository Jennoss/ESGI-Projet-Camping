<?php

require '../function.php';

$bdd_connexion = bddConnect();
$disponibleLogement = $_POST['disponibleLogement'];
$jusquaLogement = $_POST['jusquaLogement'];


$query = $bdd_connexion -> prepare ("UPDATE PRODUIT SET date_entree = :date_entree WHERE id_produit = :id_produit");
$query -> execute([
    ":date_entree" => $disponibleLogement,
    ":id_produit" => $_GET['id']
]);

$query = $bdd_connexion -> prepare ("UPDATE PRODUIT SET date_sortie = :date_sortie WHERE id_produit = :id_produit");
$query -> execute([
    ":date_sortie" => $jusquaLogement,
    ":id_produit" => $_GET['id']
]);






header('Location: ../../inc/admin/hebergement_modify.php?id=' . $_GET['id']);
