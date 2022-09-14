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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
        <script src="https://smtpjs.com/v3/smtp.js"></script>

    <title>Camping</title>
</head>

<body>

    <?php
    session_start();
    require '../back/function.php';
    require './navbar.php';




    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    
    $bdd_connect = bddConnect();
    $query = $bdd_connect -> prepare('SELECT * FROM USER WHERE email = :email');
    $query -> execute([
        ':email' => $_SESSION['email']
    ]);

    $user = $query -> fetchAll();


    $queryFacture = $bdd_connect -> prepare('SELECT * FROM FACTURE WHERE email = :email');
    $queryFacture -> execute([
        ":email" => $_SESSION['email']
    ]);
    $facture = $queryFacture -> fetchAll();
    
    ?>


    <div class="container-xl px-4 mt-4" id="bill">
        <!-- Payment methods card-->
        <!-- Billing history card-->
        <div class="card mb-4">
            <div class="card-header">Historiques d'achats</div>
            <div class="card-body p-0">
                <!-- Billing history table-->
                <div class="table-responsive table-billing-history">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th class="border-gray-200" scope="col">Id de transaction</th>
                                <th class="border-gray-200" scope="col">Date</th>
                                <th class="border-gray-200" scope="col">Prix</th>
                                <th class="border-gray-200" scope="col">Status</th>
                                <th class="border-gray-200" scope="col">Facture</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for($i = 0; $i < sizeOf($facture); $i++) { ?>
                            <tr data-id='<?php echo $facture[$i]['id_facture'] ?>'>
                                <td><?php echo $facture[$i]['id_facture'] ?></td>
                                <td><?php echo $facture[$i]['date_paiement'] ?></td>
                                <td><?php echo $facture[$i]['prix_total'] . "€"?></td>
                                <td><span class="badge bg-success text-white">Paiement effectué</span></td>
                                <td><a href="./page_profil.php?id=<?php echo $facture[$i]['id_facture'] ?>"><button type="button" class="btn btn-danger badge text-white">Visualisé</button></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    

    <?php if(!empty($_GET['id'])) {?>
        <?php 
            
            $query = $bdd_connect -> prepare('SELECT * FROM FACTURE WHERE id_facture = :id_facture');
            $query -> execute([
                ":id_facture" => $_GET['id']
            ]);
            $fetchFacture = $query -> fetchAll();

            function dateDiffInDays($date1, $date2) 
            {
                $diff = strtotime($date2) - strtotime($date1);
                return abs(round($diff / 86400));
            }
        
            $dateDiff = dateDiffInDays($fetchFacture[0]['depart'], $fetchFacture[0]['fin']);

            $query = $bdd_connect -> prepare('SELECT * FROM PRODUIT WHERE id_produit = :id_produit');
            $query -> execute([
                ':id_produit' => $fetchFacture[0]['id_produit']
            ]);
            $produit = $query -> fetchAll();
        ?>
        
        <div class="container mt-5 mb-5" id='html2pdf'>
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="text-left logo p-2 px-5">
                            <img src="../back/logement_upload/photo/logo.png" width="100">
                        </div>
                        <div class="invoice p-5">
                            <h5>Votre réservation</h5>
                            <span class="font-weight-bold d-block mt-4">Bonjour, <?php echo $fetchFacture[0]['nom'] . " " . $fetchFacture[0]['prenom'] ?></span>
                            <span>Votre paiement a bien était prit en compte, voici un récapitulatif de votre réservation</span>
                            <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                                <table class="table table-borderless">

                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="py-2">

                                                    <span class="d-block text-muted">Date de paiement</span>
                                                    <span><?php echo $fetchFacture[0]['date_paiement'] ?></span>

                                                </div>
                                            </td>

                                            <td>
                                                <div class="py-2">

                                                    <span class="d-block text-muted">Réservation numéro :</span>
                                                    <span><?php echo $fetchFacture[0]['id_facture'] ?></span>

                                                </div>
                                            </td>

                                            <td>
                                                <div class="py-2">

                                                    <span class="d-block text-muted">Payment</span>
                                                    <span><img src="https://img.icons8.com/color/48/000000/mastercard.png"
                                                            width="20" /></span>

                                                </div>
                                            </td>

                                            <td>
                                                <div class="py-2">

                                                    <span class="d-block text-muted">Période de réservation</span>
                                                    <span><?php echo $fetchFacture[0]['depart'] . " / " . $fetchFacture[0]['fin'] ?></span>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>





                            </div>




                            <div class="product border-bottom table-responsive">

                                <table class="table table-borderless">

                                    <tbody>
                                        <tr>
                                            <td width="20%">

                                                <img src="https://www.camping-lacdorient.com/ressources/medias/103-editeur_page_bloc_element-allee-camping-avec-tente-et-caravanne-1440x659.jpg" width="90">

                                            </td>

                                            <td width="60%">
                                                <span class="font-weight-bold">Prix de la nuit : </span>
                                                <div class="product-qty">
                                                    <span class="d-block">Nombres de nuits : </span>
                                                </div>
                                            </td>
                                            <td width="20%">
                                                <div class="text-right">
                                                    <span class="font-weight-bold"><?php echo $produit[0]['prix'] . "€" . " / " . "Nuit"?></span>
                                                </div>
                                                <div class="text-right">
                                                    <span class="font-weight-bold"><?php echo $dateDiff . "  nuits"?></span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>



                            </div>



                            <div class="row d-flex justify-content-end">

                                <div class="col-md-5">

                                    <table class="table table-borderless">

                                        <tbody class="totals">

                                            <tr>
                                                <td>
                                                    <div class="text-left">

                                                        <span class="text-muted">Prix de la nuit : </span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span><?php echo $produit[0]['prix'] . " €"?></span>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td>
                                                    <div class="text-left">

                                                        <span class="text-muted">Nombres de nuits</span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span><?php echo $dateDiff ?></span>
                                                    </div>
                                                </td>
                                            </tr>


                                            <tr class="border-top border-bottom">
                                                <td>
                                                    <div class="text-left">

                                                        <span class="font-weight-bold">Prix total</span>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="text-right">
                                                        <span class="font-weight-bold"><?php echo $fetchFacture[0]['prix_total'] . " €" ?></span>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>

                                </div>



                            </div>


                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, maiores.</p>
                            <p class="font-weight-bold mb-0">Merci d'avoir reservez chez nous !</p>
                            <span>Camping Team</span>


                        


                        </div>


                        <div class="d-flex justify-content-between footer p-3">

                            <span></span>
                            <span><?php echo $fetchFacture[0]['date_paiement'] ?></span>

                        </div>




                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php } ?>
    
    <?php if(!empty($_GET['id'])) { ?>
        <button id="exportPDF" class="btn btn-primary active mb-5 mt-5 d-grid gap-2 col-2 mx-auto" >Export PDF</button>
    <?php } ?>
    <script>
        let htmlPDF = document.getElementById('html2pdf');
        let exportPDF = document.getElementById('exportPDF');
        exportPDF.onclick = (e) => html2pdf(htmlPDF);
    </script>

        





    <script src="../src/js/profil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>