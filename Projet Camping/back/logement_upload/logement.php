<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



session_start();
require '../function.php';

require '../../vendor/autoload.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51Lb3HfIrHud9qlwW96eWLSn3CdF7pbqJI8Ysy5HTNuma4zOjlfNPA4zTa6g7AVVraTPPNXLhf0CebXugGUDax0xg00Wlom8mXR');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost/PA-CAMPING';




$titreLogement = htmlspecialchars($_POST["titreLogement"]);
$descriptionLogement = htmlspecialchars($_POST["descriptionLogement"]);
$nbrPieceLogement = htmlspecialchars($_POST["nbrPieceLogement"]);
$litsLogement = htmlspecialchars($_POST["litsLogement"]);
$superficieLogement = htmlspecialchars($_POST["superficieLogement"]);
$disponibleLogement = htmlspecialchars($_POST["disponibleLogement"]);
$jusquaLogement = htmlspecialchars($_POST["jusquaLogement"]);
$nbrPersonnesLogement = htmlspecialchars($_POST["nbrPersonnesLogement"]);
$prixLogement = htmlspecialchars($_POST["prixLogement"]);
$type = 'Logement';


$stripe = new \Stripe\StripeClient('sk_test_51Lb3HfIrHud9qlwW96eWLSn3CdF7pbqJI8Ysy5HTNuma4zOjlfNPA4zTa6g7AVVraTPPNXLhf0CebXugGUDax0xg00Wlom8mXR');
$produit = $stripe->products->create(['name' => $titreLogement]);
//var_dump($produit);

$price = \Stripe\Price::create([
    'product' => $produit->id,
    'unit_amount' => (int)$prixLogement * 100,
    'currency' => 'eur',
]);



$bdd_connexion = bddConnect();



$query = $bdd_connexion-> prepare('INSERT INTO PRODUIT(type, superficie, prix, titre, description, date_entree, date_sortie, pieces, lits, personne, product_id, price_id) VALUES(:type, :superficie, :prix, :titre, :description, :date_entree, :date_sortie, :pieces, :lits, :personne, :product_id, :price_id)');
$query -> execute([
    ":type" => $type,
    ":superficie" => $superficieLogement,
    ":prix" => $prixLogement,
    ":titre" => $titreLogement,
    ":description" => $descriptionLogement,
    ":date_entree" => $disponibleLogement,
    ":date_sortie" => $jusquaLogement,
    ":pieces" => $nbrPieceLogement,
    ":lits" => $litsLogement,
    ":personne" => $nbrPersonnesLogement,
    ":product_id" => $price -> product,
    ":price_id" => $price -> id
]);


$request =  $bdd_connexion -> prepare ('SELECT id_produit FROM PRODUIT WHERE titre = :titre');
$request -> execute ([
    ":titre" => $titreLogement
]);

$getRequest = $request -> fetchAll();

$keyLength = 10;
$key = "";
for($i = 1; $i < $keyLength; $i++){
    $key .= mt_rand(0, 9);
}



$type = 'logement';
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