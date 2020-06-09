<?php

// Si la page est appelée directement par son adresse, on redirige en passant pas la page index
if (basename($_SERVER["PHP_SELF"]) != "index.php")
{
	header("Location:../index.php");
	die("");
}
	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 
	$tab = valider('tab');
?>


<?php if(valider("admin","SESSION")==1) { ?>

    <div class="page-header">
      <h1>Gérer les emprunts</h1>
    </div> <br/>
	
<div>
 	  <?php include("templates/listeremprunts.php");?>
</div>


<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>


