<!DOCTYPE html>
<html lang="fr_FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
<?php require 'navbar.php';
      session_start();
?>
<style>
  .alert-danger{
    margin: 0;
    padding: 0;
  }
</style>
<?php if(!empty($_SESSION['mdpDif'])) { ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $_SESSION['mdpDif']; ?>
    <?php unset($_SESSION['mdpDif']); ?>
  </div>
  <?php } ?>

  <?php if(!empty($_SESSION['mdpSize'])) { ?>
  <div class="alert alert-danger" role="alert">
    <?php echo $_SESSION['mdpSize']; ?>
    <?php unset($_SESSION['mdpSize']); ?>
  </div>
  <?php } ?>

  <?php if(!empty(  $_SESSION["error_uppercase_missing"])) { ?>
  <div class="alert alert-danger" role="alert">
    <?php echo   $_SESSION["error_uppercase_missing"]; ?>
    <?php unset(  $_SESSION["error_uppercase_missing"]); ?>
  </div>
  <?php } ?>

  <?php if(!empty( $_SESSION["wrong_email"])) { ?>
  <div class="alert alert-danger" role="alert">
    <?php echo  $_SESSION["wrong_email"]; ?>
    <?php unset( $_SESSION["wrong_email"]); ?>
  </div>
  <?php } ?>

<section class="vh-100 bg-image">
 
  <div class="mask d-flex align-items-center h-100 gradient-custom-3 mt-4">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Créer mon compte</h2>

              <form method="POST" action="../back/inscription.php">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="nom" value='<?php if(!empty($_SESSION['nom'])) {echo $_SESSION['nom'];} ?>' required/>
                  <label class="form-label" for="form3Example1cg">Nom</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="prenom" class="form-control form-control-lg" value='<?php if(!empty($_SESSION['prenom'])) {echo $_SESSION['prenom'];} ?>' required/>
                  <label class="form-label" for="form3Example1cg">Prénom</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" value='<?php if(!empty($_SESSION['email'])) {echo $_SESSION['email'];} ?>' required/>
                  <label class="form-label"  for="form3Example3cg">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3cg" name="user" class="form-control form-control-lg" value='<?php if(!empty($_SESSION['user'])) {echo $_SESSION['user'];} ?>' required/>
                  <label class="form-label"  for="form3Example3cg">Nom d'utilisateur</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" required/>
                  <label class="form-label"  for="form3Example4cg">Mot de passe</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" name="mdp2" class="form-control form-control-lg" required/>
                  <label class="form-label"  for="form3Example4cdg">Confirmez votre mot de passe</label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body mt-3">Inscription</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Vous avez un compte ? <a href="./connexion.php" class="link-info">Connectez-vous</a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
unset($_SESSION['nom']);
unset($_SESSION['prenom']);
unset($_SESSION['email']);
unset($_SESSION['user']);

?>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>