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
        $query = $bdd_connexion -> prepare ('SELECT * FROM USER WHERE id_user = :id_user');
        $query -> execute([
            ":id_user" => $_GET['id_user']
        ]);
        $users = $query -> fetchAll();

        $query = $bdd_connexion -> prepare ('SELECT * FROM AVIS WHERE id_user = :id_user');
        $query -> execute([
            ":id_user" => $_GET['id_user']
        ]);
        $note = $query -> fetchAll();
    
    ?>

    <div class="container">
        <h1 class="display-4 fw-bold text-center mt-5">Profil de <?php echo $users[0]['nom'] ?></h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum obcaecati error facilis, dolores repudiandae iure impedit? Placeat incidunt, nisi maiores, illo iste laudantium natus beatae veniam sint, fuga quas itaque?</p>
        </div>
        <hr class="mt-5">
    </div>

    

    <div class="container mt-5">
        <div class="list-group w-auto">
            <span class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="https://cdn-icons-png.flaticon.com/512/5079/5079583.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Prenom de l'utilisateur : </h6>
                        <p class="mb-0 opacity-75">Cette utilisateur s'appelle : <?php echo $users[0]['prenom'] ?></p>
                    </div>
                </div>
            </span>

            <span class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="https://cdn-icons-png.flaticon.com/512/5079/5079583.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Nom de l'utilisateur : </h6>
                        <p class="mb-0 opacity-75">Le nom de famille est : <?php echo $users[0]['nom'] ?></p>
                    </div>
                </div>
            </span>

            <span class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="https://cdn-icons-png.flaticon.com/512/5079/5079583.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">L'adresse email : </h6>
                        <p class="mb-0 opacity-75">Son adresse email est : <?php echo $users[0]['email'] ?></p>
                    </div>
                </div>
            </span>

            <span class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="https://cdn-icons-png.flaticon.com/512/5079/5079583.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Son rôle : </h6>
                        <p class="mb-0 opacity-75">Cet utilisateur est un : <?php echo $users[0]['power'] ?></p>
                    </div>
                </div>
            </span>

            <span class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <img src="https://cdn-icons-png.flaticon.com/512/5079/5079583.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">Nom d'utilisateur : </h6>
                        <p class="mb-0 opacity-75">Son nom d'utilisateur est : <?php echo $users[0]['user'] ?></p>
                    </div>
                </div>
            </span>
        </div>


        <hr class="mt-5">
    </div>

    <div class="container">
        <h1 class="display-4 fw-bold text-center mt-5">Information complémentaire</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4 text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum obcaecati error facilis, dolores repudiandae iure impedit? Placeat incidunt, nisi maiores, illo iste laudantium natus beatae veniam sint, fuga quas itaque?</p>
        </div>

        <h3 class="display-4 fw-bold text-center mt-5">Avis</h3>
        <div class="list-group w-auto mt-5">
            <?php if(sizeOf($note) > 1) { ?>

                <?php for($i = 0; $i < sizeOf($note); $i++) { ?>
                    <span class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                        <img src="https://cdn-icons-png.flaticon.com/512/5079/5079583.png" alt="twbs" width="32" height="32" class="rounded-circle flex-shrink-0">
                        <div class="d-flex gap-2 w-100 justify-content-between">
                            <div>
                                    <h6 class="mb-0">
                                        <?php if((int)$note[$i]['note'] === 1) { ?>
                                        <span>
                                            1
                                            <i class="fa-solid fa-star star-color"></i>
                                        </span>
                                    <?php } ?>
                                    <?php if((int)$note[$i]['note'] === 2) { ?>
                                        <span>
                                            2
                                            <i class="fa-solid fa-star star-color"></i>
                                        </span>
                                    <?php } ?>
                                    <?php if((int)$note[$i]['note'] === 3) { ?>
                                        <span>
                                            3
                                            <i class="fa-solid fa-star star-color"></i>
                                        </span>
                                    <?php } ?>
                                    <?php if((int)$note[$i]['note'] === 4) { ?>
                                        <span>
                                            4
                                            <i class="fa-solid fa-star star-color"></i>
                                        </span>
                                    <?php } ?>
                                    <?php if((int)$note[$i]['note'] === 5) { ?>
                                        <span>
                                            5
                                            <i class="fa-solid fa-star star-color"></i>
                                        </span>
                                    <?php } ?>
                                    
                                </h6>
                                <p class="mb-0 opacity-75">Avis : <?php echo $note[$i]['description'] ?></p>
                            </div>
                            <small class="opacity-50 text-nowrap"><a href="./delete_avis.php?id_avis=<?php echo $note[$i]['id_avis'] ?>"><button type='button' class="btn btn-danger">Supprimer</button></a>
                                <a href="../../carousel-10/index.php?id=<?php echo $note[$i]['id_produit'] ?>"><button type='button' class="btn btn-success">Voir</button></a>
                            </small>
                        </div>
                    </span>
                <?php } ?>
                <?php } elseif(sizeOf($note) == 0) { ?>
                    <div class="container">
                    <div class="alert alert-primary text-center" role="alert">
                        Cet utilisateur n'a pas encore laissez d'avis...
                    </div>
                    </div>
                <?php } ?>
        </div>
    </div>

    <br>
    <br>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>
</html>