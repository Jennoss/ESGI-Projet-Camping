<!DOCTYPE html>
<html lang="fr_FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link href="../src/css/style.css" rel="stylesheet" />
    <title>Camping</title>
</head>

<body>
    <?php 
        session_start();
        if(empty($_SESSION)){
            header('Location: ./accueil.php');
        }
        require 'navbar.php';
        require '../back/function.php';
        $bdd_connexion = bddConnect();
        $query = $bdd_connexion -> prepare('SELECT * FROM PRODUIT');
        $query -> execute ([]);
        $produits = $query -> fetchAll();

    
    
    
    ?>
    <div class="container">
        <button id="logementBtn" type="button" class="btn btn-primary mt-5 ml-5">Logement</button>
        <button id="emplacementBtn" type="button" class="btn btn-primary mt-5 ml-5">Emplacement</button>
    </div>
    <div class="container mt-3">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

            

            <?php for($i = 0; $i < sizeof($produits) ; $i++) { ?>
                <?php 
                    $photoRequest = $bdd_connexion -> prepare('SELECT image FROM PHOTO WHERE id_produit = :id_produit');
                    $photoRequest -> execute([
                        ":id_produit" => $produits[$i]['id_produit']
                    ]);
                    $photo = $photoRequest -> fetchAll();
                    
                    
                    ?>
                <div class="col typeof" data-type="<?php echo $produits[$i]['type'] ?>">
                    <div class="card shadow-sm">
                        <img src="../back/logement_upload/photo/<?php echo $photo[0]['image'] ?>" class="bd-placeholder-img card-img-top" width="100%" height="225"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                        </img>

                        <div class="card-body">
                            <h6><?php echo $produits[$i]['titre'] ?></h6>
                            <p class="card-text"><?php echo $produits[$i]['description'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="../carousel-10/index.php?id=<?php echo $produits[$i]['id_produit'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">En savoir plus</button></a>
                                </div>
                                <small class="text-muted">Type : <?php echo $produits[$i]['type'] ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    </div>

    <script src="./list_hebergement.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>