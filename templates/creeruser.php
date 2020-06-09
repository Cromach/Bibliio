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
	
	<form action="controleur.php" method="POST" class="menu p-4" id="creerUser">
		  <div class="row">
		    <div class="col">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="nom">Prénom</span>
					  </div>
					  <input type="text" class="form-control" name="prenom" aria-describedby="nom">
					</div>
			</div>
		    
		    <div class="col">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="prenom">Nom</span>
					  </div>
					  <input type="text" class="form-control" name="nom" aria-describedby="prenom">
					</div>
		   </div>
		  </div>

		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="auteur">Date de naissance</span>
		  </div>
		  <input type="date" class="form-control" name="naissance" aria-describedby="naissance">
		</div>

		  <div class="row">
		    <div class="col-md-4">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="prenom">Telephone</span>
					  </div>
					  <input type="text" class="form-control" name="tel" aria-describedby="tel">
					</div>
			</div>
		    <div class="col-md-8">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text" id="prenom">Adresse mail</span>
					  </div>
					  <input type="address" class="form-control" name="mail" aria-describedby="mail">
					</div>
		   </div>
		  </div>

		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="prenom">Adresse</span>
		  </div>
		  <input type="text" class="form-control" name="adresse" aria-describedby="adresse">
		</div>

		<div class="custom-control custom-checkbox">
		  <input type="checkbox" name="admin" class="custom-control-input" id="adminCheck">
		  <label class="custom-control-label" for="adminCheck">Administrateur</label> <br/> <br/>
		</div>

		<input type="submit" class="btn btn-primary btn-lg" name="action" value="Créer un utilisateur"/>
	</form>	
	</div>
	
	<div id="success" style="display: none;">
	<p style='color: green;'>L'utilisateur a bien été ajoutée</p>
	<button class="btn btn-primary btn-lg redo">Ajouter un autre utilisateur</button>
	</div>

	<div id="error" style="display: none;">
	<p id="p-error" style='color: red;'>La série n'a pas été ajoutée, veuillez entrer une valeur valide dans chacun des champs</p>
	<button class="btn btn-primary btn-lg redo">Réessayer</button>
	</div>


<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>

<script>
$("#creerUser").submit(function(e){ // On sélectionne le formulaire par son identifiant
    e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire

    var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
     
  	$.ajax({
		url : 'ajax/creeruser.php',
		type : 'POST',
		data : donnees,
		dataType : 'text',
	   
	   
		success : function(data){
			console.log(data);
			$("#creerUser").toggle();
			if(data=="Success") $('#success').toggle();
			if(data=="Error") { $('#error').toggle(); $('#p-error').html("<p style='color: red;'>L'utilisateur n'a pas été ajoutée, veuillez entrer un nom, un prénom et une date de naissance valides</p>");}
			if(data=="Exist") { $('#error').toggle(); $('#p-error').html("<p style='color: red;'>Cet utilisateur existe déjà</p>");}
		},
	   
    });

});

$(".redo").click(function() {
	$('#success').hide();
	$('#error').hide();
	$('#creerUser').show();
});


</script>