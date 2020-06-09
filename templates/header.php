<?php
// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}
include_once "libs/modele.php";
// Pose qq soucis avec certains serveurs...
echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- **** H E A D **** -->
<head>	
	<script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
		}
		
		$(function(){
			$( "#target" ).dblclick(function() {
				alert( "Handler for .dblclick() called." );
			});
		})
		

    </script>
	<link rel="icon" href="ressources/bibliio.png">
	<script src="https://kit.fontawesome.com/05f96bf93f.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="bootstrap/js/bootstrap.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>
	
	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Bibliio</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->

	<!-- Liaisons aux fichiers css de Bootstrap -->

	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="css/bibliio.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
	<link href="css/sticky-footer.css" rel="stylesheet" />
	<!--[if lt IE 9]>
	  <script src="js/html5shiv.js"></script>
	  <script src="js/respond.min.js"></script>
	<![endif]-->


	

</head>
<!-- **** F I N **** H E A D **** -->


<!-- **** B O D Y **** -->
<body>

<!-- style inspiré de http://www.bootstrapzero.com/bootstrap-template/sticky-footer --> 

<!-- Wrap all page content here -->
<div id="wrap">
  
  <!-- Fixed navbar -->

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand ml-2" href="index.php?view=accueil"><img src="ressources/bibliio_white.png" height="40px" width="auto"/></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?view=accueil">Accueil <span class="sr-only">(current)</span></a>
        </li>
		
        	<?php if (valider("connecte","SESSION")) { ?>
		<div class="dropdown navbar-nav">
		  <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Proposer des ouvrages
		  </a>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="index.php?view=proposerserie">Proposer une série</a>
			<a class="dropdown-item" href="index.php?view=proposerlivre">Proposer un ouvrage</a>
		  </div>
		</div>
		<?php } ?>
		
        <li class="nav-item">
          <?php if (!valider("connecte","SESSION"))
				echo '<a class="nav-link" href="index.php?view=login">Se connecter</a>' ?>
        </li>
        <li class="nav-item">
           <?php if (valider("connecte","SESSION")) { ?>
			<div class="dropdown navbar-nav">
			  <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Profil
			  </a>
			  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				<a class="dropdown-item" href="index.php?view=profil">Afficher mon profil</a>
				<a class="dropdown-item" href="index.php?view=listeperso">Liste de lecture</a>
			  </div>
			</div>
			<?php } ?>
        </li>
      </ul>
	<?php if (valider("connecte","SESSION") && valider("admin","SESSION")==1) { ?>
		<div class="dropdown navbar-nav">
		  <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Administration
		  </a>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<a class="dropdown-item" href="index.php?view=gererbiblio">Gérer la bibliothèque</a>
			<a class="dropdown-item" href="index.php?view=gereremprunt">Gérer les emprunts</a>
			<a class="dropdown-item" href="index.php?view=gereruser">Gérer les utilisateurs</a>
		  </div>
		</div>
		<?php } ?>
		<form class="form-inline" action="controleur.php" method="POST">
		  <input class="form-control mr-sm-2" name="search" type="search" placeholder="Rechercher" aria-label="Rechercher">
		  <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="action" value="Rechercher"/>
		</form>
   <?php if (valider("connecte","SESSION")) { ?>

		<div class="dropdown">
		  <button class="btn shadow-none my-2 my-sm-0 dropdown-toggle" type="button" id="notif" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-flag"></i> 
		  </button>
			<div class="dropdown-menu p-4 text-muted dropdown-menu-lg-right" style="width: 600px;">
			  <p>
				<li class="media">
					<div class="media-body">
					<div class="row">
						<div class="col-6">
							Livres empruntés
						</div>
						<div class="col-3">
							Date d'emprunt
						</div>
						<div class="col-3" >
							Date limite
						</div>
					</div>
					</div>
				</li>
				<hr>
				  
			  </p>
			  <p class="mb-0">
				<?php 
				$emprunts = getUserEmprunts($_SESSION['idUser']);
				foreach ($emprunts as $emprunt){
				$livre = getTomeById($emprunt['id_tome']);
				$date1 = new DateTime("now");
				$date2 = new DateTime($emprunt["date_limite"]);
				 ?>
				<li class="media" <?php if($date2<$date1) echo 'style="color: red;"'; ?>>
					<div class="media-body">
					<div class="row">
						<div class="col-6">
						 <h5 class="mt-0 mb-1 text-break">
							<a class="text-decoration-none text-reset" href="index.php?view=serie&tome=<?php echo $livre['id_tome']; ?>"><?php echo $livre["titre"]; ?></a> <br/>
						 </h5>
						</div>
						<div class="col-3">
							<?php echo $emprunt["date"]; ?>
						</div>
						<div class="col-3" >
							<?php echo $emprunt["date_limite"]; ?>
						</div>
					</div>
					</div>
				</li>
				<hr>
				<?php } ?>
			  </p>
			</div>
		</div>
   <?php } ?>
    </div>
  </nav>
  <!-- Begin page content -->
  <div class="container">