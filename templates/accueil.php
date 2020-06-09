<?php

//C'est la propriété php_self qui nous l'indique : 
// Quand on vient de index : 
// [PHP_SELF] => /chatISIG/index.php 
// Quand on vient directement par le répertoire templates
// [PHP_SELF] => /chatISIG/templates/accueil.php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
// Pas de soucis de bufferisation, puisque c'est dans le cas où on appelle directement la page sans son contexte
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php?view=accueil");
	die("");
}
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

?>


    <div class="page-header">
      <h1>Bienvenue sur Bibliio</h1>
    </div>

    <p class="lead">
	voici les dernières séries du moment : <br/><br/><br/>
	
	<div class="swiper-container">
		<div class="swiper-wrapper">
			<?php
			$nouv = getAccueilTomes(10);
			foreach($nouv as $tome) {
				$urlbase = dirname($_SERVER["PHP_SELF"]) . '/index.php?view=serie&tome='.$tome["id_tome"];
			?>
			<div class="swiper-slide">
				<a href="<?php echo $urlbase; ?>"><img src="<?php echo $tome["photo"]; ?>" alt="Image de <?php echo $tome["titre"] ?>" height="300px" width="194px" /></a>
			</div>
			<?php
			}
			?>
		</div>
		<!-- Add Pagination -->
		<!-- <div class="swiper-pagination"></div> -->
		<!-- Add Arrows -->
		<!-- <div class="swiper-button-next"></div> -->
		<!-- <div class="swiper-button-prev"></div> -->
	</div>
  
	</p>
