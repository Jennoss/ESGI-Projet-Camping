<!DOCTYPE html>
<html lang="fr_FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href='../src/css/style.css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Camping</title>
</head>

<body>

    <?php
    session_start();
    require '../back/function.php';
    require './navbar.php';
    
    $bdd_connexion = bddConnect();
    $query = $bdd_connexion -> prepare('SELECT * FROM PRODUIT WHERE id_produit = :id_produit');
    $query -> execute ([
        ":id_produit" => $_GET['id']
    ]);
    $produits = $query -> fetchAll();

    $id_produit = $produits[0]['id_produit'];
    $price_id = $produits[0]['price_id'];
    $product_id = $produits[0]['product_id'];
    $date_entree = $produits[0]['date_entree'];
    $date_sortie = $produits[0]['date_sortie'];

    $baseURL = "../back/payment.php";
    $URL = $baseURL . "?id=" . $id_produit . "&price_id=" . $price_id . "&product_id=" . $product_id . "&depart=" . $date_entree . "&fin=" . $date_sortie . "&prix=" . $produits[0]['prix'];
    
    
    ?>

    <main class="container">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4"
                src="https://image.similarpng.com/very-thumbnail/2020/09/Camping-logo-design-on-transparent-background-PNG.png"
                alt="" width="72" height="57">
            <h2><?php echo $produits[0]['titre'] ?></h2>
            <p class="lead"><?php echo $produits[0]['description'] ?></p>
        </div>

        <div class="row g-5 justify-content-center">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Votre réservation</span>
                    <span id='count' class="badge bg-primary rounded-pill">1</span>
                </h4>
                <ul id="reservationList" class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0"><?php echo $produits[0]['type'] ?></h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span value='<?php echo $produits[0]['prix'] ?> ' id="produitPrix"
                            class="text-muted"><?php echo $produits[0]['prix'] ?> <span> €</span></span>
                    </li>
                </ul>
                <form id='formPaiement' action="<?php echo $URL ?>" method="POST">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (EUR)</span>
                            <span name="price" id="totalPrice"></span>
                        </li>
                    </ul>

                    <div class="mb-3 mt-3 col-12">
                        <label for="dateDepart" class="form-label">Début</label>
                        <input type="date" name="depart" class="form-control" id="dateDepart" min="<?php echo $produits[0]['date_entree'] ?>" max="<?php echo $produits[0]['date_sortie']?>" required>
                    </div>

                    <div class="mb-3 mt-3 col-12">
                        <label for="dateJusq" class="form-label">Fin</label>
                        <input type="date" name="fin" class="form-control" id="dateJusq" min="<?php echo $produits[0]['date_entree'] ?>" max="<?php echo $produits[0]['date_sortie']?>" required>
                    </div>
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
            </div>

            </form>

            <!-- <div class="col-md-7 col-lg-8">
                

                        <div class="list-group mx-0">
                        <label for="email" class="form-label">Nos formules</label>
                            <label class="list-group-item d-flex gap-2">
                                <input id="normal" name="normal" value="0" class="form-check-input flex-shrink-0" type="checkbox">
                                <span>
                                    Normal <span class="text-muted"> (+0€)</span>
                                    <small class="d-block text-muted">With support text underneath to add more
                                        detail</small>
                                </span>
                            </label>
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0" type="checkbox" id="activite" name="activite" value="12">
                                <span>
                                    Activité <span class="text-muted"> (+12€)</span>
                                    <small class="d-block text-muted">Some other text goes here</small>
                                </span>
                            </label>
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0" type="checkbox" value="12" id="menage" name="menage">
                                <span>
                                    Mènage <span class="text-muted"> (+12€)</span>
                                    <small class="d-block text-muted">Some other text goes here</small>
                                </span>
                            </label>
                            <label class="list-group-item d-flex gap-2">
                                <input class="form-check-input flex-shrink-0" type="checkbox" id="activitemenage" name="activitemenage" value="20">
                                <span>
                                    Activité + mènage <span class="text-muted"> (+20€)</span>
                                    <small class="d-block text-muted">And we end with another snippet of text</small>
                                </span>
                            </label>
                        </div>
                    </div>
        </div> -->
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>