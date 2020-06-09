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

<?php if(valider("admin","SESSION")==1) { ?>

	<div class="lead">
	
	<form action="controleur.php" method="POST" class="menu p-4" id="creerSerie">
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
		<input type="submit" class="btn btn-primary btn-lg" name="action" value="Créer la série"/> <div id="result"></div>
	</form>	
	</div>

	<div id="success" style="display: none;">
	<p style='color: green;'>La série a bien été ajoutée</p>
	<button class="btn btn-primary btn-lg redo">Ajouter une autre série</button>
	</div>

	<div id="error" style="display: none;">
	<p id="p-error" style='color: red;'>La série n'a pas été ajoutée, veuillez entrer une valeur valide dans chacun des champs</p>
	<button class="btn btn-primary btn-lg redo">Réessayer</button>
	</div>

<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>

<script>
$("#creerSerie").submit(function(e){ // On sélectionne le formulaire par son identifiant
    e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire

    var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
     
  	$.ajax({
		url : 'ajax/creerserie.php',
		type : 'POST',
		data : donnees,
		dataType : 'text',
	   
	   
		success : function(data){
			console.log(data);
			$("#creerSerie").toggle();
			if(data=="Success") $('#success').toggle();
			if(data=="Error") { $('#error').toggle(); $('#p-error').html("<p style='color: red;'>La série n'a pas été ajoutée, veuillez entrer une valeur valide dans chacun des champs</p>");}
			if(data=="Exist") { $('#error').toggle(); $('#p-error').html("<p style='color: red;'>Une série portant ce nom existe déjà</p>");}
		},
	   
    });

});

$(".redo").click(function() {
	$('#success').hide();
	$('#error').hide();
	$('#creerSerie').show();
});


</script>