<!DOCTYPE html>
<html lang="fr_FR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <link href="../../src/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <title>Camping</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php require '../navbar_admin.php' ;
      require('../../back/function.php');
      session_start();
      if($_SESSION['power'] != 'admin'){
        header('Location: ../accueil.php');
    }
      $bdd_connexion = bddConnect();
      $query = $bdd_connexion -> prepare ('SELECT * FROM PRODUIT WHERE id_produit = :id_produit');
      $query -> execute([
        ':id_produit' => $_GET['id']
      ]);
      $produit = $query -> fetchAll();

      $noteQuery = $bdd_connexion -> prepare ('SELECT * FROM AVIS WHERE id_produit = :id_produit');
      $noteQuery -> execute ([
        ":id_produit" => $_GET['id']
      ]);
      $note = $noteQuery -> fetchAll();

      $one = 0;
      $two = 0;
      $tree = 0;
      $four = 0;
      $five = 0;

      for($i = 0; $i < sizeOf($note); $i++){
        if((int)$note[$i]['note'] == 1){
            $one++;
        }
        if((int)$note[$i]['note'] == 2){
            $two++;
        }
        if((int)$note[$i]['note'] == 3){
            $tree++;
        }
        if((int)$note[$i]['note'] == 4){
            $four++;
        }
        if((int)$note[$i]['note'] == 5){
            $five++;
        }
      }

?>


    <section class="text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light"><?php echo $produit[0]['titre'] ?></h1>
                <p class="lead text-muted"><?php echo $produit[0]['description'] ?></p>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">Nombres de notes <i class="fa-solid fa-star" style='color: orange;'></i></h2>
                <canvas id="myChart" height="100"></canvas>
            </div>
        </div>
    </div>
    <script>
    let one = <?php echo $one ?>;
    let two = <?php echo $two ?>;
    let tree = <?php echo $tree ?>;
    let four = <?php echo $four ?>;
    let five = <?php echo $five ?>;
    console.log(five);




    const labels = [
        '5',
        '4',
        '3',
        '2',
        '1',
    ];

    const data = {
        labels: labels,
        datasets: [{
        label: 'Nombre de note',
        backgroundColor: [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
        ],
        data: [five, four, tree, two, one],
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    </script>

    <div class="list-group w-auto container mt-5">
        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://img.icons8.com/ios-glyphs/344/room.png" alt="twbs" width="32" height="32"
                class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">Superficie</h6>
                    <p class="mb-0 opacity-75">Ce logement dispose de <?php echo $produit[0]['superficie'] ?> m².</p>
                </div>
                <input type="radio" class="btn-check" name="vbtn-radio" id="superficie" autocomplete="off">
                <label class="btn btn-outline-danger" for="vbtn-radio2" id="modifier_superficie_toggle">Modifier</label>
            </div>
        </a>
        <form id="superficie_form" action="../../back/modify/superficie.php?id=<?php echo $produit[0]['id_produit'] ?>"
            method="POST">
            <div class="mb-3 mt-3">
                <input type="number" name="superficie" class="form-control" id="exampleFormControlInput1"
                    placeholder="">
                <button id="superficie_annuler" type="button" class="btn btn-danger mt-3">Annuler</button>
                <button id="superficie_confirmer" type="submit" class="btn btn-success mt-3">Confirmer</button>
            </div>
        </form>
        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://img.icons8.com/sf-black-filled/344/home.png" alt="twbs" width="32" height="32"
                class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">Type de location</h6>
                    <?php if($produit[0]['type'] === 'Logement'){ ?>
                    <p class="mb-0 opacity-75">C'est un logement et ne dispose donc pas d'emplacement.</p>
                    <?php } ?>
                    <?php if($produit[0]['type'] === 'Emplacement'){ ?>
                    <p class="mb-0 opacity-75">C'est un emplacement.</p>
                    <?php } ?>
                </div>
                <input type="radio" class="btn-check" name="vbtn-radio" id="location" autocomplete="off">
                <label class="btn btn-outline-danger" for="vbtn-radio2" id="modifier_location_toggle">modifier</label>
            </div>
        </a>


        <form id="location_form" action="../../back/modify/location.php?id=<?php echo $produit[0]['id_produit'] ?>"
            method="POST">
            <div class="mb-3 mt-3">
                <select class="form-select" name="location" aria-label="Default select example">
                    <option selected></option>
                    <option value="Emplacement" name="location">Emplacement</option>
                    <option value='Logement' name="location">Logement</option>
                </select>
                <button id="location_annuler" type="button" class="btn btn-danger mt-3">Annuler</button>
                <button id="location_confirmer" type="submit" class="btn btn-success mt-3">Confirmer</button>
            </div>
        </form>


        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://img.icons8.com/ios-glyphs/344/cost.png" alt="twbs" width="32" height="32"
                class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">Tarifs</h6>
                    <p class="mb-0 opacity-75">Le prix pour ce logement est de <?php echo $produit[0]['prix'] ?> euros
                        par nuit.</p>
                </div>
                <input type="radio" class="btn-check" name="vbtn-radio" id="tarifs" autocomplete="off">
                <label class="btn btn-outline-danger" for="vbtn-radio2" id="tarif_modifier_toggle">Modifier</label>
            </div>
        </a>


        <form id="tarif_form" action="../../back/modify/tarif.php?id=<?php echo $produit[0]['id_produit'] ?>"
            method="POST">
            <div class="mb-3 mt-3">
                <input type="number" name="tarif" class="form-control" id="exampleFormControlInput1" placeholder="">
                <button id="tarif_annuler" type="button" class="btn btn-danger mt-3">Annuler</button>
                <button id="tarif_confirmer" type="submit" class="btn btn-success mt-3">Confirmer</button>
            </div>
        </form>


        <?php if($produit[0]['type'] === 'Logement'){ ?>
        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://img.icons8.com/sf-ultralight-filled/344/room.png" alt="twbs" width="32" height="32"
                class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">Nombres de pieces</h6>
                    <p class="mb-0 opacity-75">Il y a <?php echo $produit[0]['pieces'] ?> pieces.</p>
                </div>
                <input type="radio" class="btn-check" name="vbtn-radio" id="pieces" autocomplete="off">
                <label class="btn btn-outline-danger" id="pieces_modifier_toggle" for="vbtn-radio2">Modifier</label>
            </div>
        </a>



        <form id="pieces_form" action="../../back/modify/pieces.php?id=<?php echo $produit[0]['id_produit'] ?>"
            method="POST">
            <div class="mb-3 mt-3">
                <input type="number" name="pieces" class="form-control" id="exampleFormControlInput1" placeholder="">
                <button id="pieces_annuler" type="button" class="btn btn-danger mt-3">Annuler</button>
                <button id="pieces_confirmer" type="submit" class="btn btn-success mt-3">Confirmer</button>
            </div>
        </form>

        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://img.icons8.com/ios-filled/344/bedroom.png" alt="twbs" width="32" height="32"
                class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">Nombres lits</h6>
                    <p class="mb-0 opacity-75">Ce logement dispose de <?php echo $produit[0]['lits'] ?> lits.</p>
                </div>
                <input type="radio" class="btn-check" name="vbtn-radio" id="lits" autocomplete="off">
                <label class="btn btn-outline-danger" for="vbtn-radio2" id="lits_modifier_toggle">Modifier</label>
            </div>
        </a>

        <form id="lits_form" action="../../back/modify/lits.php?id=<?php echo $produit[0]['id_produit'] ?>"
            method="POST">
            <div class="mb-3 mt-3">
                <input type="number" name="lits" class="form-control" id="exampleFormControlInput1" placeholder="">
                <button id="lits_annuler" type="button" class="btn btn-danger mt-3">Annuler</button>
                <button id="lits_confirmer" type="submit" class="btn btn-success mt-3">Confirmer</button>
            </div>
        </form>


        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://img.icons8.com/ios-glyphs/344/person-male.png" alt="twbs" width="32" height="32"
                class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">Personnes maximum</h6>
                    <p class="mb-0 opacity-75">Ce logement peut accueillir jusqu'a <?php echo $produit[0]['personne'] ?>
                        personnes maximum.</p>
                </div>
                <input type="radio" class="btn-check" name="vbtn-radio" id="personnes" autocomplete="off">
                <label id="personne_modifier_toggle" class="btn btn-outline-danger" for="vbtn-radio2">Modifier</label>
            </div>
        </a>

        <form id="personne_form" action="../../back/modify/personne.php?id=<?php echo $produit[0]['id_produit'] ?>"
            method="POST">
            <div class="mb-3 mt-3">
                <input type="number" name="personne" class="form-control" id="exampleFormControlInput1" placeholder="">
                <button id="personne_annuler" type="button" class="btn btn-danger mt-3">Annuler</button>
                <button id="personne_confirmer" type="submit" class="btn btn-success mt-3">Confirmer</button>
            </div>
        </form>
        <?php } ?>

        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
            <img src="https://img.icons8.com/ios-glyphs/344/calendar-13.png" alt="twbs" width="32" height="32"
                class="rounded-circle flex-shrink-0">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">Disponibilité</h6>
                    <p class="mb-0 opacity-75">Ce logement est disponible du <?php echo $produit[0]['date_entree'] ?> au
                        <?php echo $produit[0]['date_sortie'] ?></p>
                </div>
                <input type="radio" class="btn-check" name="vbtn-radio" id="disponibilite" autocomplete="off">
                <label id="disponibilite_modifier_toggle" class="btn btn-outline-danger"
                    for="vbtn-radio2">Modifier</label>
            </div>
        </a>

        <form action="../../back/modify/disponibilite.php?id=<?php echo $produit[0]['id_produit'] ?>"
            class="row justify-content-center" id="disponibilite_form" method='POST'>

            <div class="mb-3 mt-2 col-6">
                <label for="dateDepart" class="form-label">Disponible le</label>
                <input type="date" name="disponibleLogement" class="form-control" id="dateDepart">
            </div>

            <div class="mb-3 col-6">
                <label for="dateJusq" class="form-label">Jusqu'à</label>
                <input type="date" name="jusquaLogement" class="form-control" id="dateJusq" disabled>
            </div>


            <button id="disponibilite_annuler" type="button" class="btn btn-danger mt-3 col-2">Annuler</button>
            <button id="disponibilite_confirmer" type="submit" class="btn btn-success mt-3 col-2">Confirmer</button>
        </form>
    </div>


    <section class="text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Images de déscriptions</h1>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">Déscription du post</strong>
                        <h3 class="mb-0">Image descriptive</h3>
                        <p class="card-text mb-auto mt-3">Les images permettent aux utilisateurs de mieux visualisé
                            l'endroit qu'il vont reservé. De bonnes images peuvent augmenté les chances pour que
                            le client effectue une réservation. Vous avez la possibilité de mettre plusieurs images.
                        </p>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250"
                            src="../../carousel-10/images/slider-1.jpg" role="img" aria-label="Placeholder: Thumbnail"
                            preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"></rect>
                        </img>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Mettre en ligne une autres image</h5>
                        <p class="card-text mt-3">This card has a regular title and short paragraph of text below it.
                        </p>
                        <form action="../../back/add_image_logement.php?id=<?php echo $produit[0]['id_produit']  ?>"
                            method="POST" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <input name="fileToUpload" class="form-control" type="file" id="formFile" required>
                            </div>
                            <button type="submit" class="btn btn-success">Ajouter une image</button>
                        </form>
                    </div>
                </div>
            </div>

            <section class=" text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Images de publié pour ce bien</h1>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <?php
        $imageRequest = $bdd_connexion -> prepare ('SELECT * FROM PHOTO WHERE id_produit = :id_produit');
        $imageRequest -> execute([
        ':id_produit' => $_GET['id']
        ]);
        $images = $imageRequest -> fetchAll();
    ?>
    <div class="container">
        <div class="row">
            <?php for($i = 0; $i < sizeof($images); $i++) { ?>
            <figure class="figure col-md-4" data-id="<?php echo $images[$i]['id_photo'] ?>"
                data-imageName="<?php echo $images[$i]['image'] ?>">
                <img src="../../back/logement_upload/photo/<?php echo $images[$i]['image'] ?>"
                    class="figure-img img-fluid rounded figureimg" alt="...">
                <a
                    href="../../back/modify/delete_photo.php?id_photo=<?php echo $images[$i]['id_photo'] ?>&image=<?php echo $images[$i]['image'] ?>&id=<?php echo $produit[0]['id_produit']  ?>"><button
                        type="button" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button></a>
            </figure>
            <?php } ?>
        </div>
    </div>



    <script src="../../src/js/modify.js"></script>
    <script src="../../src/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>