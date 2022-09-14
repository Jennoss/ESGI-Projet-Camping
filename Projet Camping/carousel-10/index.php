<!doctype html>
<html lang="en">

<head>
	<title>Carousel 10</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="../src/css/style.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/68b21beafa.js" crossorigin="anonymous"></script>
</head>

<body>


	<?php
			session_start();
			if($_SESSION['power'] === 'admin'){
				require '../inc/navbar_admin.php';
			} else {
				require '../inc/navbar.php';
			}
			
			require '../back/function.php';
			$bdd_connect = bddConnect();
			$query = $bdd_connect -> prepare("SELECT * FROM PRODUIT WHERE id_produit = :id_produit");
			$query -> execute([
				":id_produit" => $_GET['id']
			]);
			$produits = $query -> fetchAll();
			
			ini_set('display_errors', 0);
			ini_set('display_startup_errors', 0);
			error_reporting(-1);
			

			$photoRequest = $bdd_connect -> prepare('SELECT image FROM PHOTO WHERE id_produit = :id_produit');
			$photoRequest -> execute ([
				":id_produit" => $_GET['id']
			]);
			$photos = $photoRequest -> fetchAll();
			$baseUrl = "../inc/bill_information.php";
			$urlId = $produits[0]['id_produit'];
			$productId = $produits[0]['product_id'];
			$priceId = $produits[0]['price_id'];

			$url = $baseUrl . "?id=" . $urlId . "&product_id=" . $productId . "&price_id=" . $priceId;
			$queryUrl = parse_url($url, PHP_URL_QUERY);
			
		?>


	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="heading-section mb-2 pb-md-4"><?php echo $produits[0]['titre'] ?></h2>
					<p><?php echo $produits[0]['description'] ?></p>
				</div>
				<div class="col-md-12">
					<div class="slider-hero">
						<div class="featured-carousel owl-carousel">

							<?php for($i = 0; $i < sizeof($photos); $i++) { ?>
							<div class="item">
								<div class="work">
									<div class="img d-flex align-items-center justify-content-center"
										style="background-image: url(../back/logement_upload/photo/<?php echo $photos[$i]['image'] ?>);">
									</div>
								</div>
							</div>

							<?php } ?>
						</div>

						<div class="my-5 text-center">
							<ul class="thumbnail">
								<?php for($i = 0; $i < sizeof($photos); $i++) { ?>
								<li><a href="#"><img
											src="../back/logement_upload/photo/<?php echo $photos[$i]['image'] ?>"
											alt="Image" class="img-fluid tkt"></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if($produits[0]['type'] === 'Logement') { ?>
	<div class="container">
		<div class="container px-4 py-5" id="icon-grid">
			<h2 class="pb-2 border-bottom">Informations</h2>

			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
				<div class="col d-flex align-items-start">
					<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-maximize" width="1.75em" height="1.75em"></i>
					<div>
						<h4 class="fw-bold mb-0">Superficie</h4>
						<p>Ce logement vous propose une superficie de <?php echo $produits[0]['superficie'] ?> m².</p>
					</div>
				</div>
				<div class="col d-flex align-items-start">
					<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-table-cells-large" width="1.75em"
						height="1.75em"></i>
					<div>
						<h4 class="fw-bold mb-0">Nombres de pieces</h4>
						<p>Il y a en tout <?php echo $produits[0]['pieces'] ?> pieces dans ce logement.</p>
					</div>
				</div>


				<div class="col d-flex align-items-start">
					<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-person" width="1.75em" height="1.75em"></i>
					<div>
						<h4 class="fw-bold mb-0">Pers. maximum</h4>
						<p>Au maximum <?php echo $produits[0]['personne'] ?> personnes peuvent occuper ce logement.</p>
					</div>
				</div>


				<div class="col d-flex align-items-start">
					<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-bed" width="1.75em" height="1.75em"></i>
					<div>
						<h4 class="fw-bold mb-0">Nombres de lits</h4>
						<p>Il y a en tout <?php echo $produits[0]['lits'] ?> lits disponible.</p>
					</div>
				</div>

				<div class="col d-flex align-items-start">
					<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-money-bill" width="1.75em"
						height="1.75em"></i>
					<div>
						<h4 class="fw-bold mb-0">Tarifs</h4>
						<p>Le prix est de <?php echo $produits[0]['prix'] ?> euros par nuit.</p>
					</div>
				</div>

				<div class="col d-flex align-items-start">
					<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-money-bill" width="1.75em"
						height="1.75em"></i>
					<div>
						<h4 class="fw-bold mb-0">Type de location</h4>
						<p>Il sagit là d'un <?php echo $produits[0]['type']?>.</p>
					</div>
				</div>

				<div class="col d-flex align-items-start">
					<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-money-bill" width="1.75em"
						height="1.75em"></i>
					<div>
						<h4 class="fw-bold mb-0">Disponibilité</h4>
						<p>Ce logement est mise à disposition du <?php echo $produits[0]['date_entree']?> au
							<?php echo $produits[0]['date_sortie']?>.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>



	<?php if($produits[0]['type'] === 'Emplacement') { ?>
		<div class="container">
			<div class="container px-4 py-5" id="icon-grid">
				<h2 class="pb-2 border-bottom">Informations</h2>

				<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
					<div class="col d-flex align-items-start">
						<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-maximize" width="1.75em" height="1.75em"></i>
						<div>
							<h4 class="fw-bold mb-0">Superficie</h4>
							<p>Ce logement vous propose une superficie de <?php echo $produits[0]['superficie'] ?> m².</p>
						</div>
					</div>

					<div class="col d-flex align-items-start">
						<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-money-bill" width="1.75em"
							height="1.75em"></i>
						<div>
							<h4 class="fw-bold mb-0">Tarifs</h4>
							<p>Le prix est de <?php echo $produits[0]['prix'] ?> euros par nuit.</p>
						</div>
					</div>

					<div class="col d-flex align-items-start">
						<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-money-bill" width="1.75em"
							height="1.75em"></i>
						<div>
							<h4 class="fw-bold mb-0">Type de location</h4>
							<p>Il sagit là d'un <?php echo $produits[0]['type']?>.</p>
						</div>
					</div>

					<div class="col d-flex align-items-start">
						<i class="bi text-muted flex-shrink-0 me-3 fa-solid fa-money-bill" width="1.75em"
							height="1.75em"></i>
						<div>
							<h4 class="fw-bold mb-0">Disponibilité</h4>
							<p>Ce logement est mise à disposition du <?php echo $produits[0]['date_entree']?> au
								<?php echo $produits[0]['date_sortie']?>.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php if($_SESSION['power'] != 'admin') { ?>
		<div class="border border-light p-3">
			<div class="text-center">
				<a href="<?php echo $url ?>"><button
						type="button" class="btn btn-primary">Reservez maintenant</button></a>
			</div>
		</div>
	<?php } ?>


		




		<style>
			.card {
    
    border: none;
    box-shadow: 5px 6px 6px 2px #e9ecef;
    border-radius: 4px;
}


.dots{

    height: 4px;
  width: 4px;
  margin-bottom: 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

.badge{

        padding: 7px;
        padding-right: 9px;
    padding-left: 16px;
    box-shadow: 5px 6px 6px 2px #e9ecef;
}

.user-img{

    margin-top: 4px;
}

.check-icon{

    font-size: 17px;
    color: #c3bfbf;
    top: 1px;
    position: relative;
    margin-left: 3px;
}

.form-check-input{
    margin-top: 6px;
    margin-left: -24px !important;
    cursor: pointer;
}


.form-check-input:focus{
    box-shadow: none;
}


.icons i{

    margin-left: 8px;
}
.reply{

    margin-left: 12px;
}

.reply small{

    color: #b7b4b4;

}


.reply small:hover{

    color: green;
    cursor: pointer;

}

.bdge {
  height: 21px;
  background-color: orange;
  color: #fff;
  font-size: 11px;
  padding: 8px;
  border-radius: 4px;
  line-height: 3px;
}

.comments {
  text-decoration: underline;
  text-underline-position: under;
  cursor: pointer;
}

.dot {
  height: 7px;
  width: 7px;
  margin-top: 3px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

.hit-voting:hover {
  color: blue;
}

.hit-voting {
  cursor: pointer;
}
		</style>




<?php 
	$query = $bdd_connect -> prepare('SELECT * FROM AVIS WHERE id_produit = :id_produit');
	$query -> execute([
		':id_produit' => $_GET['id']
	]);
	$comments = $query -> fetchAll();
	
	$account = $bdd_connect -> prepare('SELECT * FROM USER WHERE id_user = :id_user');
	$account -> execute([
		':id_user' => $comments[0]['id_user']
	]);
	$fetchAccount = $account -> fetchAll();
	

	

?>

<div class="container-fluid">

            <div class="row  d-flex justify-content-center">

                <div class="col-md-8">

                    <div class="headings d-flex justify-content-between align-items-center mb-3">
                        <h5>Commentaires</h5>
                        
						
							</div>

								<div class="card p-3">

								<?php for($i = 0; $i < sizeOf($comments); $i++) { ?>
									<?php 
									$query = $bdd_connect -> prepare ('SELECT user FROM USER WHERE id_user = :id_user');
									$query -> execute ([
										':id_user' => $comments[$i]['id_user']
									]);
									$userFetch = $query -> fetchAll();

									
									?>

									<div class="d-flex justify-content-between align-items-center">

										<div class="user d-flex flex-row align-items-center">

											<img src="../back/logement_upload/photo/avatar.png" width="30" class="user-img rounded-circle mr-2">
											<span><small class="font-weight-bold text-primary"><?php echo $userFetch[0]['user']  ?></small> <small class="font-weight-bold"><?php echo $comments[$i]['description'] ?></small></span>
											
											
										</div>
										<?php if((int)$comments[$i]['note'] === 1) { ?>
											<span>
												<i class="fa-solid fa-star star-color"></i>
											</span>
										<?php } ?>
										<?php if((int)$comments[$i]['note'] === 2) { ?>
											<span>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
											</span>
										<?php } ?>
										<?php if((int)$comments[$i]['note'] === 3) { ?>
											<span>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
											</span>
										<?php } ?>
										<?php if((int)$comments[$i]['note'] === 4) { ?>
											<span>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
											</span>
										<?php } ?>
										<?php if((int)$comments[$i]['note'] === 5) { ?>
											<span>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
												<i class="fa-solid fa-star star-color"></i>
											</span>
										<?php } ?>
									</div>
									<?php } ?>
								
							</div>
							
								



					<?php 
						$query = $bdd_connect -> prepare('SELECT * FROM USER WHERE email = :email');
						$query -> execute([
							':email' => $_SESSION['email']
						]);
						$fetchUser = $query -> fetchAll();

						

					?>
				<?php if($_SESSION['power'] != 'admin') { ?>
					<form action="./avis.php?id=<?php echo $_GET['id'] ?>" method="POST">
						<div class="coment-bottom bg-white p-2 px-4">
                    	<div class="d-flex flex-row add-comment-section mt-4 mb-4">
							<img class="img-fluid img-responsive rounded-circle mr-2" src="../back/logement_upload/photo/avatar.png" width="38">
							<input name="comment" type="text" class="form-control mr-3" placeholder="Add comment" required>
							<label for="note" class="mr-2  mt-auto text-center">Note</label>
							<select name="note" class="form-select col-2 mr-2" aria-label="Default select example" id="note" required>
								<option value=""></option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
							<button class="btn btn-primary col-2" type="submit">Comment</button>
						</div>
					</form>
				<?php } ?>

					
                   
                
            </div>
            
        </div>

		<br>
		<br>


	<!-- <div class="container">
		<div class="my-3 p-3 bg-body rounded shadow-sm">
			<h6 class="border-bottom pb-2 mb-0">Avis</h6>
			<div class="d-flex text-muted pt-3">
				<svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32"
					xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32"
					preserveAspectRatio="xMidYMid slice" focusable="false">
					<title>Placeholder</title>
					<rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff"
						dy=".3em">32x32</text>
				</svg>

				<div class="pb-3 mb-0 small lh-sm border-bottom w-100">
					<div class="d-flex justify-content-between">
						<strong class="text-gray-dark">Full Name</strong>
					</div>
					<span class="d-block">@username</span>
				</div>
			</div>
		</div>
	</div> -->

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
	</script>
	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>