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
	$idserie = valider('serie');
	$serie = getSeriesByID($idserie);
?>

<?php if($_SESSION["admin"]==1) { ?>

    <div class="page-header">
      <h2>Ajouter un livre à la série <?php echo $serie['titre']; ?> </h2>
    </div> <br/>
	
	<div class="lead">

	<form action="controleur.php" method="POST" class="menu p-4 row" id="creerLivre" enctype="multipart/form-data">

		<div class="col-8">

			<div class="input-group mb-3">
			  <input type="hidden" class="form-control" name="idserie" value="<?php echo $idserie; ?>">
			</div>
			
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Numéro de Tome</span>
			  </div>
			  <input type="number" class="form-control" name="numtome" aria-describedby="basic-addon1">
			</div>
			


			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Titre</span>
			  </div>
			  <input type="text" class="form-control" name="titre" aria-describedby="basic-addon1">
			</div>

			<div class="input-group mb-3">
			   <textarea class="form-control" name="desc" aria-label="With textarea" rows="8" cols="45" placeholder="Résumé du livre"></textarea>
			</div>

			<div class="input-group mb-3">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Nombre de tomes</span>
			  </div>
			  <input type="number" class="form-control" name="nbtome" aria-describedby="basic-addon1">
			</div>

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
		<input type="submit" class="btn btn-primary btn-lg" name="action" value="Créer le tome"/>
		
	</form>
	
	<div id="success" style="display: none;">
		<p style='color: green;'>Le tome a bien été ajouté</p>
		<button class="btn btn-primary btn-lg redo">Ajouter un autre livre</button>
	</div>

	<div id="error" style="display: none;">
		<p id="p-error" style='color: red;'></p>
		<button class="btn btn-primary btn-lg redo">Réessayer</button>
	</div>
	
	</div>


<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>

<script>
$("#creerLivre").submit(function(e){ // On sélectionne le formulaire par son identifiant
    e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire

    var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
     
  	$.ajax({
		url : 'ajax/creerlivre.php',
		type : 'POST',
		data : donnees,
		dataType : 'text',
	   
	   
		success : function(data){
			console.log(data);
			$("#creerLivre").toggle();
			if(data=="Success") $('#success').toggle();
			if(data=="Error") { $('#error').toggle(); $('#p-error').html("<p style='color: red;'>La série n'a pas été ajoutée, veuillez entrer un titre et un numéro de tome valides</p>");}
			if(data=="Exist") { $('#error').toggle(); $('#p-error').html("<p style='color: red;'>Un livre possède déjà ce numéro de tome dans cette série</p>");}
		},
	   
    });

});

$(".redo").click(function() {
	$('#success').hide();
	$('#error').hide();
	$('#creerLivre').show();
});


</script>