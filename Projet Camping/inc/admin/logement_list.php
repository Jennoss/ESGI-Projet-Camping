<!DOCTYPE html>
<html lang="fr_FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="../../src/css/style.css" rel="stylesheet" />
    <title>Camping</title>
</head>

<body>

    <?php
        session_start();

        if($_SESSION['power'] != 'admin'){
            header('Location: ../accueil.php');
        }
        require '../navbar_admin.php';
        require('../../back/function.php');
        $bdd_connexion = bddConnect();
        $query = $bdd_connexion -> prepare ('SELECT * FROM PRODUIT');
        $query -> execute([]);
        $logement = $query -> fetchAll();


    
    ?>
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php for($i = 0; $i < sizeof($logement); $i++ ){?>
                <?php $request = $bdd_connexion -> prepare ('SELECT image FROM PHOTO WHERE id_produit = :id_produit');
                    $request -> execute([
                        ":id_produit" => $logement[$i]['id_produit']
                    ]);
                    $photo = $request -> fetchAll();
                ?>
                    <div class="col" data-id='<?php echo $logement[$i]['id_produit'] ?>'>
                        <div class="card h-100">
                            <img src="../../back/logement_upload/photo/<?php echo $photo[0]['image'] ?>" class="card-img-top img-logement" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $logement[$i]['titre'] ?></h5>
                                <p class="card-text"><?php echo $logement[$i]['description'] ?></p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Supérficie : <?php echo $logement[$i]['superficie'] . ' m²' ?></li>
                                    <li class="list-group-item">Type : <?php echo $logement[$i]['type'] ?></li>
                                    <li class="list-group-item">Prix : <?php echo $logement[$i]['prix'] . ' €' ?></li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="./hebergement_modify.php?id=<?php echo $logement[$i]['id_produit'] ?>"><button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button></a>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                    </div>

            <?php }?>

        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>