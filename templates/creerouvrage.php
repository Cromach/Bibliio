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
	
	<form action="controleur.php" method="POST" class="menu p-4 row" enctype="multipart/form-data" id='creerOuvrage'>

		<div class="col-8">
		
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
				<label class="input-group-text" for="selecTypeOuvrage">Type</label>
			  </div>
			  <select class="custom-select" name="typeSerie" id="selecTypeOuvrage">
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
			
			<div class="input-group mb-3">
			   <textarea class="form-control" name="description" aria-label="With textarea" rows="8" cols="45" placeholder="Résumé du livre"></textarea>
			</div>
			
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Nombre de tomes</span>
			  </div>
			  <input type="number" class="form-control" name="nbtome" aria-describedby="basic-addon1">
			</div>

			<input type="submit" class="btn btn-primary btn-lg" name="action" value="Créer le livre"/>
			
		</div>
			
		<div class="col-3 offset-1 border-left">
		
		Couverture du tome : <br/>
		<div class="image-upload ml-2">
		  <label for="file-input">
			<img id="preview" src="bookpics/default.png" height="100%" width="auto" />
		  </label>
		  <input id="file-input" name="photo" type="file" onchange="readURL(this);" style="display: none;" />
		</div>
		
		</div>
		
		
	</form>
	
	<div id="successOuvrage" style="display: none;">
	<p style='color: green;'>L'ouvrage a bien été créé</p>
	<button class="btn btn-primary btn-lg redoOuvrage">Ajouter un autre ouvrages</button>
	</div>

	<div id="errorOuvrage" style="display: none;">
	<p id="p-errorOuvrage" style='color: red;'></p>
	<button class="btn btn-primary btn-lg redoOuvrage">Réessayer</button>
	</div>
	
	</div>

<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>

<script>
$("#creerOuvrage").submit(function(e){ // On sélectionne le formulaire par son identifiant
    e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire

    var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
     
  	$.ajax({
		url : 'ajax/creerouvrage.php',
		type : 'POST',
		data : donnees,
		dataType : 'text',
	   
	   
		success : function(data){
			console.log(data);
			$("#creerOuvrage").toggle();
			if(data=="SuccessSuccess") $('#successOuvrage').toggle();
			if(data=="Error") { $('#errorOuvrage').toggle(); $('#p-errorOuvrage').html("<p style='color: red;'>La série n'a pas été ajoutée, veuillez entrer un titre et un auteur valides</p>");}
			if(data=="Exist") { $('#errorOuvrage').toggle(); $('#p-errorOuvrage').html("<p style='color: red;'>Une série portant ce nom existe déjà</p>");}
			if(data=="SuccessExist") { $('#errorOuvrage').toggle(); $('#p-errorOuvrage').html("<p style='color: red;'>Un livre possède déjà ce numéro de tome dans cette série</p>");}
		},
	   
    });

});

$(".redoOuvrage").click(function() {
	$('#successOuvrage').hide();
	$('#errorOuvrage').hide();
	$('#creerOuvrage').show();
});


</script>