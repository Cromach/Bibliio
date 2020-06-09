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
	voici les dernières séries du moment :
	<div class="row" style="overflow-x: auto; flex-wrap: nowrap">
	<?php
    $nouv = get5Tomes();
    foreach($nouv as $tome) {
    	$urlbase = dirname($_SERVER["PHP_SELF"]) . '/index.php?view=serie&tome='.$tome["id_tome"];
	?>
	<div class="box-livre" style="margin:15px">
		<a href="<?php echo $urlbase; ?>"><img src="<?php echo $tome["photo"]; ?>" alt="Image de <?php echo $tome["titre"] ?>" height="300px" width="194px" /></a>
	</div>
	<?php
	}
	?>
	</div>
	</p>
