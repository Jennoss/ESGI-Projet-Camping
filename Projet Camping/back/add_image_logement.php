<?php 

require './function.php';

$bdd_connexion = bddConnect();

$keyLength = 10;
$key = "";
for($i = 1; $i < $keyLength; $i++){
    $key .= mt_rand(0, 9);
}



$type = 'logement';
$target_dir = "./logement_upload/photo/";
$target_file = $target_dir . $key;


$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
$image_name = $key . "." . $imageFileType;

$uploadRequest = $bdd_connexion -> prepare('INSERT INTO PHOTO (image, id_produit) VALUES(:image, :id_produit)');
$uploadRequest -> execute([
    ":image" => $image_name,
    ":id_produit" => $_GET['id']
]);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file  . "." .  $imageFileType);
header('Location: ../inc/admin/hebergement_modify.php?id=' . $_GET['id']);

?>