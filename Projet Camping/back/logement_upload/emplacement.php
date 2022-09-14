<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



session_start();
require '../function.php';

$titreEmplacement = htmlspecialchars($_POST["titreEmplacement"]);
$descriptionEmplacement = htmlspecialchars($_POST["descriptionEmplacement"]);
$superficieEmplacement = htmlspecialchars($_POST["superficieEmplacement"]);
$disponibleEmplacement = htmlspecialchars($_POST["disponibleEmplacement"]);
$jusquaEmplacement = htmlspecialchars($_POST["jusquaEmplacement"]);
$prixEmplacement = htmlspecialchars($_POST["prixEmplacement"]);
$type = 'Emplacement';

require '../../vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51Lb3HfIrHud9qlwW96eWLSn3CdF7pbqJI8Ysy5HTNuma4zOjlfNPA4zTa6g7AVVraTPPNXLhf0CebXugGUDax0xg00Wlom8mXR');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/PA-CAMPING';

$stripe = new \Stripe\StripeClient('sk_test_51Lb3HfIrHud9qlwW96eWLSn3CdF7pbqJI8Ysy5HTNuma4zOjlfNPA4zTa6g7AVVraTPPNXLhf0CebXugGUDax0xg00Wlom8mXR');
$produit = $stripe->products->create(['name' => $titreEmplacement]);

$price = \Stripe\Price::create([
    'product' => $produit->id,
    'unit_amount' => (int)$prixEmplacement * 100,
    'currency' => 'eur',
]);





$bdd_connexion = bddConnect();
$query = $bdd_connexion-> prepare('INSERT INTO PRODUIT(type, superficie, prix, titre, description, date_entree, date_sortie, product_id, price_id) 
VALUES(:type, :superficie, :prix, :titre, :description, :date_entree, :date_sortie, :product_id, :price_id)');
$query -> execute([
    ":type" => $type,
    ":superficie" => $superficieEmplacement,
    ":prix" => $prixEmplacement,
    ":titre" => $titreEmplacement,
    ":description" => $descriptionEmplacement,
    ":date_entree" => $disponibleEmplacement,
    ":date_sortie" => $jusquaEmplacement,
    ":product_id" => $price -> product,
    ":price_id"=> $price -> id

]);


$request =  $bdd_connexion -> prepare ('SELECT id_produit FROM PRODUIT WHERE titre = :titre');
$request -> execute ([
    ":titre" => $titreEmplacement
]);

$getRequest = $request -> fetchAll();

$keyLength = 10;
$key = "";
for($i = 1; $i < $keyLength; $i++){
    $key .= mt_rand(0, 9);
}



$type = 'emplacement';
$target_dir = "./photo/";
$target_file = $target_dir . $key;


$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
$image_name = $key . "." . $imageFileType;

$uploadRequest = $bdd_connexion -> prepare('INSERT INTO PHOTO (image, id_produit) VALUES(:image, :id_produit)');
$uploadRequest -> execute([
    ":image" => $image_name,
    ":id_produit" => $getRequest[0]['id_produit']
]);

move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file  . "." .  $imageFileType);
header("Location: ../../inc/admin/logement_list.php");