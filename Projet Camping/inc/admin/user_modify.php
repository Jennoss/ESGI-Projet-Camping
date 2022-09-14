<?php
    require '../../back/function.php';

    $id_user = $_GET['id_user'];

    $bdd_connect = bddConnect();

    $query = $bdd_connect -> prepare('DELETE FROM FACTURE WHERE email = :email');
    $query -> execute([
        ':email' => $_GET['email']
    ]);

    $query = $bdd_connect -> prepare('DELETE FROM COMMANDE WHERE id_user = :id_user');
    $query -> execute([
        ':id_user' => $id_user
    ]);


    $query = $bdd_connect -> prepare('DELETE FROM AVIS WHERE id_user = :id_user');
    $query -> execute([
        ':id_user' => $id_user
    ]);

    $query = $bdd_connect -> prepare('DELETE FROM USER WHERE id_user = :id_user');
    $query -> execute([
        ':id_user' => $id_user
    ]);
    header('Location: ./list_user.php');

?>