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
        $query = $bdd_connexion -> prepare ('SELECT * FROM USER');
        $query -> execute([]);
        $users = $query -> fetchAll();

    
    ?>

    <table class="table container mt-5">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Nom d'utilisateur</th>
                <th scope="col">Suppression</th>
                <th scope="col">Profil</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i < sizeOf($users); $i++) { ?>
                
                <tr>
                    <form method='POST' action="./user_modify.php?id_user=<?php echo $users[$i]['id_user'] . "&email=" .  $users[$i]['email']?>">
                        <th scope="row" name="id_user"><?php echo $users[$i]['id_user'] ?></th>
                        <td name="prenom"><?php echo $users[$i]['prenom'] ?></td>
                        <td name="nom"><?php echo $users[$i]['nom'] ?></td>
                        <td name="email"><?php echo $users[$i]['email'] ?></td>
                        <td name="user"><?php echo $users[$i]['user'] ?></td>
                        <td><button type="submit" class="btn btn-warning">Supprimer</button></td>
                        <td><a href="./userInformation.php?id_user=<?php echo $users[$i]['id_user'] . "&user=" . $users[$i]['user'] ?>"><button type="button" class="btn btn-warning">Voir</button></a></td>
                    </form>
                </tr>
            <?php } ?>
        </tbody>
    </table>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>