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
?>


<?php if(valider("connecte","SESSION")) { ?>

	<div class="lead">
	
	<form action="controleur.php" method="POST" class="menu p-4">
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="titre">Titre</span>
		  </div>
		  <input type="text" class="form-control" name="nomSerie" aria-describedby="titre">
		</div>

		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="auteur">Auteur</span>
		  </div>
		  <input type="text" class="form-control" name="auteurSerie" aria-describedby="auteur">
		</div>

		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<label class="input-group-text" for="selecType">Type</label>
		  </div>
		  <select class="custom-select" name="typeSerie" id="selecType">
				<?php
				$types = getTypes();
				foreach ($types as $type)
				{
					echo "<option value=\"$type[id_type]\">";
					echo  $type["description"];
					echo "</option>"; 
				}
				?>
		  </select>
		</div>

		<input type="submit" class="btn btn-primary btn-lg" name="action" value="Proposer le livre"/>
	</form>	
	</div>


<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>