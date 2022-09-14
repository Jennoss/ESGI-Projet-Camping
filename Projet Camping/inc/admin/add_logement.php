<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <link href="../../src/css/style.css" rel="stylesheet" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Camping</title>
</head>
<body>
<?php require '../navbar_admin.php';
session_start();
if($_SESSION['power'] != 'admin'){
    header('Location: ../accueil.php');
} ?>

<div class="container mt-3">
    <button type="button" id="addLogement" class="btn btn-primary mt-3">Ajoutez un logement</button>
    <button type="button" id="addEmplacement" class="btn btn-outline-primary mt-3">Ajoutez un emplacement</button>
</div>


<div id="addLogementContainer" class="container mt-3">

    <h1 class="mt-3">Ajoutez un logement</h1>
    <form method="POST" action="../../back/logement_upload/logement.php" class="row mt-3" enctype="multipart/form-data">
        <div class="mb-3 col-12">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titreLogement" class="form-control" id="titre" aria-describedby="titrehelp" required>
        </div>

        <div class="mb-3 col-12">
            <label for="description" class="form-label">Déscription</label>
            <input type="text" name="descriptionLogement" class="form-control" id="description" aria-describedby="titrehelp" name="description" required>
        </div>

        <div class="mb-3 col-12">
            <label for="nbrpiece" class="form-label">Nombres de pièces</label>
            <input type="number" name="nbrPieceLogement" class="form-control" id="nbrpiece" aria-describedby="titrehelp" required>
        </div>

        <div class="mb-3 col-12">
            <label for="lits" class="form-label">Nombres de lits</label>
            <input type="number" name="litsLogement" class="form-control" id="lits" aria-describedby="titrehelp" required>
        </div>

        <label for="Superficie" class="form-label">Superficie (en m²)</label>
        <div class="mb-3 input-group">
            <input type="number" name="superficieLogement" class="form-control" id="Superficie" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
            <span class="input-group-text" id="basic-addon2">m²</span>

        </div>


        <div class="mb-3 col-6">
            <label for="dateDepart" class="form-label">Disponible le</label>
            <input type="date" name="disponibleLogement" class="form-control" id="dateDepart" required>
        </div>

        <div class="mb-3 col-6">
            <label for="dateJusq" class="form-label">Jusqu'à</label>
            <input type="date" name="jusquaLogement" class="form-control" id="dateJusq" disabled required>
        </div>


        <div class="mb-3 col-12">
            <label for="nbrPersonnesLogement" class="form-label">Nombre de personnes</label>
            <input type="number" name="nbrPersonnesLogement" class="form-control" id="nbrPersonnesLogement" aria-describedby="numberhelp" required>
        </div>


        <label for="prixLogement" class="form-label">Prix de la nuit (en euros)</label>
        <div class="mb-3 input-group">
            <input type="number" name="prixLogement" class="form-control" id="prixLogement" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
            <span class="input-group-text" id="basic-addon2">€</span>
        </div>

        <div class="mb-3 col-12">
            <label for="imagesLogement" class="form-label">Ajoutez des images conernant ce logement</label>
            <input class="form-control" name="fileToUpload" type="file" id="imagesLogement" required>
        </div>

        <!-- <label for="Superficie" class="form-label">Informations complémentaires</label>
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">Disponible</th>
                        <th scope="col">Non disponible</th>
                        <th scope="col">Quantités</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Machine à laver</td>
                        <td><input class="form-check-input" type="checkbox" value="yes" id="machinealaverDispo" name="machinealaverDispo"></td>
                        <td><input class="form-check-input" type="checkbox" value="no" id="machinealaverNonDispo" name="machinealaverNonDispo"></td>
                        <td><input type="number" class="form-control" id="machinealaver" aria-describedby="titrehelp"></td>
                    </tr>
                    <tr>
                        <td scope="row">Lave vaiselle</td>
                        <td><input class="form-check-input" type="checkbox" value="yes" id="lavevaisselleDispo" name="lavevaisselleDispo"></td>
                        <td><input class="form-check-input" type="checkbox" value="no" id="lavevaisselleNonDispo" name="lavevaisselleNonDispo"></td>
                        <td><input type="number" class="form-control" id="lavevaiselle" aria-describedby="titrehelp"></td>
                    </tr>
                    <tr>
                        <td scope="row">Sèche linge</td>
                        <td><input class="form-check-input" type="checkbox" value="yes" id="sechelingeDispo" name="sechelingeDispo"></td>
                        <td><input class="form-check-input" type="checkbox" value="no" id="sechelingeNonDispo" name="sechelingeNonDispo"></td>
                        <td><input type="number" class="form-control" id="sechelinge" aria-describedby="titrehelp"></td>
                    </tr>
                    <tr>
                        <td scope="row">Toilettes</td>
                        <td><input class="form-check-input" type="checkbox" value="yes" id="toilettesDispo" name="ToilettesDispo"></td>
                        <td><input class="form-check-input" type="checkbox" value="no" id="toilettesNonDispo" name="toilettesNonDispo"></td>
                        <td><input type="number" class="form-control" id="toilettes" aria-describedby="titrehelp"></td>
                    </tr>
                    <tr>
                        <td scope="row">Douche</td>
                        <td><input class="form-check-input" type="checkbox" value="yes" id="doucheDispo" name="doucheDispo"></td>
                        <td><input class="form-check-input" type="checkbox" value="no" id="doucheNonDispo" name="doucheNonDispo"></td>
                        <td><input type="number" class="form-control" id="douche" aria-describedby="titrehelp"></td>
                    </tr>
                    <tr>
                        <td scope="row">Baignoire</td>
                        <td><input class="form-check-input" type="checkbox" value="yes" id="baignoireDispo" name="baignoireDispo"></td>
                        <td><input class="form-check-input" type="checkbox" value="no" id="baignoireNonDispo" name="baignoireNonDispo"></td>
                        <td><input type="number" class="form-control" id="baignoire" aria-describedby="titrehelp"></td>
                    </tr>
                    <tr>
                        <td scope="row">Place de parkings</td>
                        <td><input class="form-check-input" type="checkbox" value="yes" id="placeDeParkingDispo" name="placeDeParkingDispo"></td>
                        <td><input class="form-check-input" type="checkbox" value="no" id="placeDeParkingNonDispo" name="placeDeParkingNonDispo"></td>
                        <td><input type="number" class="form-control" id="parking" aria-describedby="titrehelp"></td>
                    </tr>
                </tbody>
            </table>

        </div> -->

        <button type="submit" class="btn btn-primary col-12 mt-3">Ajoutez</button>
            <div class="mt-3"></div>
        

    </form>
</div>

<div id="addEmplacementContainer" class="container add-emplacement">
    <div id="addLogementContainer" class="container mt-3">
    <h1 class="mt-3">Ajoutez un emplacement</h1>
    <form method="POST" action="../../back/logement_upload/emplacement.php" class="row mt-3" enctype="multipart/form-data">
        <div class="mb-3 col-12">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titreEmplacement" class="form-control" id="titre" aria-describedby="titrehelp">
        </div>

        <div class="mb-3 col-12">
            <label for="description" class="form-label">Déscription</label>
            <input type="text" name="descriptionEmplacement" class="form-control" id="description" aria-describedby="titrehelp" name="description">
        </div>

        <label for="Superficie" class="form-label">Superficie (en m²)</label>
        <div class="mb-3 input-group">
            <input type="number" name="superficieEmplacement" class="form-control" id="Superficie" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">m²</span>

        </div>


        <div class="mb-3 col-6">
            <label for="dateDepart" class="form-label">Disponible le</label>
            <input type="date" name="disponibleEmplacement" class="form-control" id="dateDepart2">
        </div>

        <div class="mb-3 col-6">
            <label for="dateJusq" class="form-label">Jusqu'à</label>
            <input type="date" name="jusquaEmplacement" class="form-control" id="dateJusq2" disabled>
        </div>


        <label for="tarif" class="form-label">Prix de la nuit (en euros)</label>
        <div class="mb-3 input-group">
            <input type="number" name="prixEmplacement" class="form-control" id="tarif" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">€</span>
        </div>

        <div class="mb-3 col-12">
            <label for="formFileMultiple" class="form-label">Ajoutez des images conernant ce logement</label>
            <input class="form-control" name="fileToUpload" type="file" id="formFileMultiple" multiple>
        </div>
            <button type="submit" class="btn btn-primary col-12">Ajoutez</button>
        </div>
    </form>
</div>
</div>


<script src="../../src/js/date_emplacement.js"></script>
<script src="../../src/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>