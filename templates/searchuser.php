<div id="searchresult">
<?php 
	include_once "../libs/modele.php";
	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 

	$search = valider('search');
	$nbUserPage = valider('nbUserPage');
	$page = valider('page');
	$page = $page-1;
	$users = getUsers($search, $nbUserPage, $page );
	foreach ($users as $user){
	$admin = ($user['admin']==1) ? "<i class='fa fa-star' aria-hidden='true'></i>" : "";
	 ?>
	 
	<div class="modal fade" id="info<?php echo $user["id_user"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Retirer de votre liste</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div class="row mx-3">
				<div class="col-6"><span class="font-weight-bolder">Date de naissance :</span> <?php echo $user['date_naissance']; ?></div>
				<div class="col-6"><span class="font-weight-bolder">Téléphone :</span> <?php echo $user['telephone']; ?></div>
				<div class="col-12"><span class="font-weight-bolder">Adresse :</span> <?php echo $user['adresse']; ?></div>
				<div class="col-12"><span class="font-weight-bolder">Adresse mail :</span> <?php echo $user['mail']; ?></div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>
		  </div>
		</div>
	  </div>
	</div>
	 
	<div class="media customli">
		<div style="width: 100px;">
			<img src="<?php echo $user["profilpic"]; ?>" alt="Image de profil de <?php echo $user["login"]; ?>" class="mr-3" height="64px" width="auto">
		</div>
		<div class="media-body row">
			<div class="col-7 text-break pt-3">
			<a class="text-decoration-none text-reset" href="index.php?view=profil&user=<?php echo $user['id_user']; ?>"><?php echo $user['prenom'].' '.$user['nom']; ?></a>
			</div>
			<div class="col-1 pt-3">
				<?php echo $admin; ?>
			</div>
			<div class="col-1 offset-2 pt-3">
				<button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#info<?php echo $user["id_user"]; ?>">Informations</button>
			</div>
		</div>
	</div>
	<?php } ?>
</div>
	<br/>

<script>
</script>
