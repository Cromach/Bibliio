<!-- Modal Gérer les stocks -->
<form action="controleur.php" method="POST"> 
<input type="hidden" name="id_livre" value="<?php echo $id_tome; ?>">
<div class="modal fade" id="gererStock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gérer les stocks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		Nombre d'exemplaire disponible : <?php echo $livre["nbtome"] - $livre["nbemprunte"];?> <br/>
		Nombre d'exemplaire : <?php echo $livre["nbtome"];?> <br/><br/>
		<div class="input-group mb-3">
		  <div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1">Nombre d'exemplaire</span>
		  </div>
		  <input type="number" class="form-control" name="nbTome" min="<?php echo $livre["nbemprunte"];?>" value="<?php echo $livre["nbtome"];?>"> <br/>
		</div>
		<div>
		<ul class="list-unstyled">
		<?php 	
		$emprunts = getEmprunts($id_tome);
		foreach ($emprunts as $emprunt)
		{
		$date1 = new DateTime("now");
		$date2 = new DateTime($emprunt["date_limite"]); 
		$verifcolor = ($emprunt["actif"]==2) ? 'color: #8ca0ff;' : '';
		$retardcolor = ($date2<$date1 && $emprunt["actif"]==1) ? 'color: red;' : '';
		$user = getUserByID($emprunt['id_user']); 
		 ?>
			<li class="media" style="<?php echo $retardcolor; echo $verifcolor; ?>">
				<div class="media-body">
				<div class="row">
					<div class="col-5">
					 <h5 class="mt-0 mb-1 text-break"><?php echo $user["login"]; ?></h5>
					</div>
					<div class="col-3">
						<?php echo $emprunt["date"]; ?>
					</div>
					<div class="col-4">
						<?php $actifbutton = ($emprunt["actif"]==1) ? 'Annuler l\'emprunt' : 'Confirmer restitution';?>
						<a href="controleur.php?action=adminRendre&tome=<?php echo $id_tome;?>&user=<?php echo $emprunt['id_user'];?>"><?php echo $actifbutton;?></a>
					</div>
				</div>
				</div>
			</li>
			<hr>
		<?php } ?>
		</ul>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <input type="submit" class="btn btn-primary" name="action" value="Sauvegarder"/><br/>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal Supprimer -->
<form action="controleur.php" method="POST"> 
<input type="hidden" name="id_livre" value="<?php echo $id_tome; ?>">
<div class="modal fade" id="supprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer le livre</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  Entrez votre mot de passe pour confirmer la suppression :
       <div class="form-group">
		<input type="password" class="form-control" name="passe" placeholder="Mot de passe">
	  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="action" value="SupprimerLivre"> Supprimer </button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="controleur.php" method="POST" enctype="multipart/form-data"> 
	<div class="page-header">
		<div class="row">
		<div class="col-8">
			<div class="input-group">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Titre de la série</span>
			  </div>
			  <input type="text" class="form-control notNull" name="titreSerie" id="titreSerie" value="<?php echo $serie["titre"]; ?>" aria-describedby="basic-addon1" style="width: 80%;">
			</div>
			<p id="titreSerieError" style="color: red; display: none;"><small>Le titre de la série ne peut pas être vide</small></p>
			<div class="mb-3"></div>
		</div>
		<div class="col-1">
	   <?php if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
		echo '<a href="index.php?view=serie&tome='.$id_tome.$toggle.'" class="text-reset text-decoration-none"><i class="fa fa-edit"></i></a>'; } ?>
		</div>
		</div>
	</div><br/>
	
<div>
	
	<input type="hidden" name="id_serie" value="<?php echo $serie['id_serie']; ?>">
	<input type="hidden" name="id_livre" value="<?php echo $id_tome; ?>">
	<div class="row">
		<div class="col-4">
			<div class="image-upload">
			  <label for="file-input">
				<img id="preview" src="<?php echo $livre["photo"]; ?>" alt="Image de <?php echo $livre["titre"] ?>" height="450px" width="291px" />
			  </label>
			  <input id="file-input" name="photo" type="file" onchange="readURL(this);" style="display: none;" />
			</div>

		</div>
		<div class="col-8">
		  <div class="row">
		   <?php if ($nbtome!=1) { ?>
			<div class="col-md-12 font-weight-bolder" style="padding-left:0"> 
			<div class="input-group">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Tome</span>
			  </div>
			  <input type="number" class="form-control notNull" name="nbTome" id="nbTome" min="0" value="<?php echo $livre["numtome"];?>"> <br/>
			</div>
			<p id="nbTomeError" style="color: red; display: none;"><small>Le numéro de tome ne peut pas être vide</small></p>
			<div class="mb-3"></div>
			<div class="input-group">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Titre</span>
			  </div>
			  <input type="text" class="form-control notNull" name="titreTome" id="titreTome" value="<?php echo $livre["titre"]; ?>" aria-describedby="basic-addon1">
			</div>
			<p id="titreTomeError" style="color: red; display: none;"><small>Le titre ne peut pas être vide</small></p>
			<div class="mb-3"></div>
			</div> 
			<?php } else { ?>
			<input type="hidden" name="nbTome" value="<?php echo $livre["numtome"];?>">
			<input type="hidden" name="titreTome" value="<?php echo $livre["titre"]; ?>">
			<?php } ?>
		  </div><br/>
		  <div class="row font-weight-bolder">
			<div class="input-group">
			  <div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Auteur</span>
			  </div>
			  <input type="text" class="form-control notNull" name="auteurSerie" id="auteurSerie" value="<?php echo $serie["auteur"]; ?>" aria-describedby="basic-addon1">
			</div>
			<p id="auteurSerieError" style="color: red; display: none;"><small>L'auteur ne peut pas être vide</small></p>
			<div class="mb-3"></div>
			</div> <br />
		  <div class="row text-justify">
		  <textarea class="form-control" name="description" aria-label="With textarea" rows="8" cols="45"><?php echo $livre["description"]; ?></textarea>
			
		  </div>
		</div>
	</div>

<div class="btn-group dropdown">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gererStock">Gérer les stocks</button>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
	<a href="index.php?view=gerertags&serie=<?php echo $serie['id_serie']; ?>" class="dropdown-item">Modifier les tags</a>
    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#supprimer">Supprimer le livre</button>
    <a href="index.php?view=creerlivre&serie=<?php echo $serie['id_serie']; ?>" class="dropdown-item">Ajouter un livre à la série</a>
  </div>
</div>
<input type="submit" class="btn btn-primary" name="action" id="editLivre" value="Éditer le livre"/><br/>

</div>
</form>

<script>
$("#titreSerie").change(function() {;
	if($("#titreSerie").val()=="")  {
		$('#titreSerieError').show();
	} 
	else $('#titreSerieError').hide();
});

$("#auteurSerie").change(function() {;
	if($("#auteurSerie").val()=="")  {
		$('#auteurSerieError').show();
	} 
	else $('#auteurSerieError').hide();
});

$("#titreTome").change(function() {;
	if($("#titreTome").val()=="")  {
		$('#titreTomeError').show();
	} 
	else $('#titreTomeError').hide();
});

$("#nbTome").change(function() {;
	if($("#nbTome").val()=="")  {
		$('#nbTomeError').show();
	} 
	else $('#nbTomeError').hide();
});

$(".notNull").change(function() {;
	var flag=0;
	$('.notNull').each(function (i, elem) {
		if($(elem).val()=="") flag=1;
	});
	console.log(flag);
	if(flag==1) $("#editLivre").prop('disabled', true);
	else if(flag==0) $("#editLivre").prop('disabled', false);
});
</script>