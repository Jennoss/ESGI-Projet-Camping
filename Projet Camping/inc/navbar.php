<header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Camping</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/PA-CAMPING/inc/accueil.php">Home</a>
          </li>
          <?php if(empty($_SESSION['connected'])){ ?>
          <li class="nav-item">
            <a class="nav-link" href="/PA-CAMPING/inc/connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/PA-CAMPING/inc/inscription.php">Inscription</a>
          </li>

         <?php } ?>


        
         <?php if($_SESSION['connected']){ ?>
          <li class="nav-item">
            <a class="nav-link" href="/PA-CAMPING/inc/list_hebergement.php">Hébergement</a>
          </li>
          </ul>
          <div class="d-flex">
          <a href="/PA-CAMPING/inc/page_profil.php"><button class="btn btn-outline-success m-2" type="submit">Réservation</button></a>
          <a class="nav-link" href="../back/disconnect.php"><button class="btn btn-outline-danger m-2">Déconnexion</button></a>
        </div>
          <?php } ?>
      </div>
    </div>
  </nav>
</header>