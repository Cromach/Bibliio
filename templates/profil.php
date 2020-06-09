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
	
	if($userid = valider('user')) $userid = valider('user'); else $userid=$_SESSION["idUser"];
	$user = getUserByID($userid);
	
?> 

<?php if (valider("connecte","SESSION") && ($userid==$_SESSION["idUser"] || valider("admin","SESSION"))) { ?>

<div class="lead">
	
	<div class="row">
	  <div class="col-3 border-right">
		<img id="preview" src="<?php echo $user["profilpic"]; ?>" alt="Image de de profil de <?php echo $user["prenom"] ?>" class="my-4" height="auto" width="200px">
		<div class="list-group" id="list-tab" role="tablist" style="width: 200px;">
		  <a class="list-group-item list-group-item-action active" id="list-infos-list" data-toggle="list" href="#list-infos" role="tab" aria-controls="infos">Informations</a>
		  <a class="list-group-item list-group-item-action" id="list-emprunts-list" data-toggle="list" href="#list-emprunts" role="tab" aria-controls="emprunts">Emprunts</a>
		  <a class="list-group-item list-group-item-action" id="list-edit-list" data-toggle="list" href="#list-edit" role="tab" aria-controls="edit">Modifier le profil</a>
		</div>
	  </div>
	  <div class="col-8 border-left">
		<div class="m-4 border-bottom " > 
			<h2><?php echo $user['prenom'].' '; echo $user['nom']; ?></h2>

		</div>
		<div class="tab-content" id="nav-tabContent">
		  <div class="tab-pane fade show active" id="list-infos" role="tabpanel" aria-labelledby="list-infos-list">
			<div class="row mx-3">
				<div class="col-6"><span class="font-weight-bolder">Date de naissance :</span> <?php echo $user['date_naissance']; ?></div>
				<div class="col-6"><span class="font-weight-bolder">Téléphone :</span> <?php echo $user['telephone']; ?></div>
				<div class="col-12"><span class="font-weight-bolder">Adresse :</span> <?php echo $user['adresse']; ?></div>
				<div class="col-12"><span class="font-weight-bolder">Adresse mail :</span> <?php echo $user['mail']; ?></div>
			</div>
		  </div>
		  <div class="tab-pane fade" id="list-emprunts" role="tabpanel" aria-labelledby="list-emprunts-list">
			<div class="m-3">
				<?php if($userid==$_SESSION["idUser"]) { ?> Vous avez emprunté <?php echo getUserNbEmprunts($user['id_user']);?> livre<?php if(getUserNbEmprunts($user['id_user'])>1) echo 's';?> sur les 5 autorisés <?php } else { ?>
				L'utilisateur a emprunté <?php echo getUserNbEmprunts($user['id_user']);?> livre<?php if(getUserNbEmprunts($user['id_user'])>1) echo 's';?> sur les 5 autorisés <?php } ?>
				<br/><br/>
				Vos emprunts actuels : <hr>
		  		<?php 
				$emprunts = getUserEmprunts($user['id_user']);
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
			</div>
		  </div>
		  <div class="tab-pane fade" id="list-edit" role="tabpanel" aria-labelledby="list-edit-list">
			<form action="controleur.php" method="POST" enctype="multipart/form-data" id="infos">
			<div class="row mx-3">
				<input type="hidden" class="form-control" name="iduser" value="<?php echo $user['id_user']; ?>">
				<div class="col-6">		
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">Date de naissance</span>
					  </div>
					  <input type="date" class="form-control" name="naissance" value="<?php echo $user['date_naissance']; ?>" aria-describedby="naissance">
					</div>
				</div>
				<div class="col-6">					
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">Telephone</span>
					  </div>
					  <input type="text" class="form-control" value="<?php echo $user['telephone']; ?>" name="tel" aria-describedby="tel">
					</div>
				</div>
				<div class="col-12">					
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">Adresse</span>
					  </div>
					  <input type="text" class="form-control" value="<?php echo $user['adresse']; ?>" name="adresse" aria-describedby="adresse">
					</div>
				</div>
				<div class="col-12">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
						<span class="input-group-text">Adresse mail</span>
					  </div>
					  <input type="address" class="form-control" value="<?php echo $user['mail']; ?>" name="mail" aria-describedby="mail">
					</div>  
				</div>
				<div class="col-12">
					<div class="input-group mb-3">
					  <div class="custom-file">
						<input onchange="readURL(this); console.log($(this)).val();" name="photo" type="file" class="custom-file-input" id="changeprofilpic" aria-describedby="inputGroupFileAddon03">
						<label class="custom-file-label" for="changeprofilpic">Changer d'image de profil</label>
					  </div>
					</div> 
				</div>
				<input type="submit" class="btn btn-primary btn-lg" name="action" value="Modifier le profil"/>
				<button type="button" class="btn btn-primary btn-lg mx-5" id="changePasswordTab">Changer de mot de passe</button>
			</div>
			</form>
			<form action="controleur.php" method="POST" id="changePassForm">
				<input type="hidden" class="form-control" name="iduser" value="<?php echo $user['id_user']; ?>">
				<div class="mx-3" id="passwordtab" style="display: none;">
					Entrez votre nouveau mot de passe
					<div class="input-group mb-3">
					  <input type="password" class="form-control password" id="password" name="password" aria-describedby="password">
					</div>
					Confirmez votre nouveau mot de passe
					<div class="input-group">
					  <input type="password" class="form-control password" id="confirmPassword" aria-describedby="password">
					</div>
					<p id="confirmError" style="color: red; display: none;"><small>Le mot de passe ne correspond pas</small></p>
					<div class="mb-3"></div>
					<input type="submit" id="changePassword" class="btn btn-primary btn-lg disabled" name="action" value="Modifier le mot de passe"/>
					<button type="button" class="btn btn-primary btn-lg mx-5" id="infosTab">Informations</button>
					<p id="success" style='color: green; display: none;'>Votre mot de passe a bien été modifié</p>
				</div>
			</form>
		  </div>
		</div>
	  </div>
	</div>

</div>


<?php } else echo "Vous n'avez pas accès à cette page";?>
<script>
$("#changePasswordTab").click(function() {
	$('#infos').hide();
	$('#passwordtab').show();
});

$("#infosTab").click(function() {
	$('#infos').show();
	$('#passwordtab').hide();
	$('#success').hide()
});

$(".password").change(function() {
	var $password = $("#password").val();
	var $confirmPassword = $("#confirmPassword").val();
	if($confirmPassword!="" && $confirmPassword!=$password) {
		$('#confirmError').show();
		$('#changePassword').addClass('disabled');
	} else if ($confirmPassword==$password) {
	$('#confirmError').hide();
	$('#changePassword').removeClass('disabled');
	} else $('#confirmError').hide();
});

$("#changePassForm").submit(function(e){ // On sélectionne le formulaire par son identifiant
    e.preventDefault(); // Le navigateur ne peut pas envoyer le formulaire

    var donnees = $(this).serialize(); // On créer une variable content le formulaire sérialisé
     
  	$.ajax({
		url : 'ajax/changepass.php',
		type : 'POST',
		data : donnees,
		dataType : 'text',
	   
	   
		success : function(data){
			console.log(data);
			$("#creerLivre").toggle();
			if(data=="Success") $('#success').show();
		},
	   
    });

});
</script>