<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
  <?php session_start(); ?>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    
    <?php
      require 'function.php';

      ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);

      $bdd_connect = bddConnect();
      $queryEmail = $bdd_connect -> prepare('SELECT * FROM USER WHERE email = :email');
      $queryEmail -> execute ([
        ":email" => $_GET['email']
      ]);
      $email = $queryEmail -> fetchAll();

      $prenom = $email[0]['prenom'];
      $nom = $email[0]['nom'];
      $totalPrice = (int)$_GET['totalPrice'];

      $queryCommande = $bdd_connect -> prepare('INSERT INTO COMMANDE(prix, id_user) 
      VALUES (:prix, :id_user)');
      $queryCommande -> execute([
          ":prix" => $totalPrice,
          ":id_user" => $email[0]['id_user']
      ]);

      $getId = $bdd_connect -> prepare('SELECT id_commande FROM COMMANDE ORDER BY id_commande DESC LIMIT 1');
      $getId -> execute([]);
      $id = $getId -> fetchAll();

      $query = $bdd_connect -> prepare('INSERT INTO FACTURE(prenom, nom, prix_total, date_paiement, depart, fin, id_commande, email, id_produit) 
      VALUES(:prenom, :nom, :prix_total, :date_paiement, :depart, :fin, :id_commande, :email, :id_produit)');
      $query -> execute([
        ":prenom" => $prenom,
        ":nom" => $nom,
        ":prix_total" => $totalPrice,
        ":date_paiement" => date("Y-m-d"),
        ":depart" => $_GET['depart'],
        ":fin" => $_GET['fin'],
        ":id_commande" => $id[0]['id_commande'],
        ":email" => $_SESSION['email'],
        ":id_produit" => $_GET['id']
      ]);


      // var_dump($_GET['id']);
      // var_dump($_GET['totalPrice']);
      // var_dump($_GET['email']);
      // var_dump($_GET['depart']);
      // var_dump($_GET['fin']);
      // echo date("Y-m-d");
      
    ?>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your purchase request,<br/> we'll be in touch shortly!</p>
      </div>
    </body>

    <script>
          window.setTimeout(function(){
            window.location.href = "../inc/page_profil.php";

            }, 5000);
    </script>

</html>