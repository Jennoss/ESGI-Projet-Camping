<?php
require './function.php';

$bdd_connect = bddConnect();
$query = $bdd_connect -> prepare ('DELETE FROM AVIS WHERE id_avis = :id_avis');
$query -> execute([
    ':id_avis' => $_GET['id_avis']
]);
header('Location: ./list_user.php');


?>