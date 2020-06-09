<div id="searchresult">
<?php 
	include_once "../libs/modele.php";
	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	$filtres = valider('filtres');
	$search = valider('search');
	$nbSeriePage = valider('nbSeriePage');
	$page = valider('page');
	$page = $page-1;
	$series = getPropos($filtres, $search, $nbSeriePage, $page);
	$nb=0;
	foreach ($series as $serie) {
	$nb++;
	$tomes = getTomesPropos($serie['id_serie']);
	$type = getTypeById($serie["id_type"]);
	
	 ?>
	
	
<form action="controleur.php" method="POST"> 
<input type="hidden" id="id_propos_form<?php echo $serie['id_serie']; ?>" name="id_serie" value="">
<div id="supprPropos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refuser la proposition</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  Entrez votre mot de passe pour confirmer la suppression de cette proposition : <br/>
       <div class="form-group">
		<input type="password" class="form-control" name="passe" placeholder="Mot de passe">
	  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
		<button type="submit" class="btn btn-primary" name="action" value="SupprimerSerie"> Supprimer </button>
      </div>
    </div>
  </div>
</div>
</form>
	
    <div id="heading<?php echo $nb; ?>">
		  <li class="media shadow-sm customli">
			<? print_r($type); ?>
			<?php if(isset($tomes[0])) { ?>
			<img src="<?php echo $tomes[0]["photo"]; ?>" alt="Image de profil de <?php echo $tomes[0]["titre"]; ?>" class="mr-3" height="80px" width="auto">
			<?php } else { ?>
			<img src="bookpics/default.png" class="mr-3" height="80px" width="auto">
			<?php } ?>
			<div class="media-body">
			<div class="row">
				<div class="col-9" style>
				 <h5 class="mt-0 mb-1 text-break"> 
				 <?php if(getTomesCountPropos($serie['id_serie'])>0) { ?>
				 <button class="btn btn-link text-decoration-none" type="button" style="padding: 0; font-size: 1.25rem;" data-toggle="collapse" data-target="#collapse<?php echo $nb; ?>" aria-expanded="true" aria-controls="collapse<?php echo $nb; ?>">
				 <?php echo $serie["titre"]; ?>                                                       
				 </button>
				 <?php } else {  ?>
					<?php echo $serie["titre"]; ?>	
				  <?php }?>
				 </h5>
				  <div class="text-justify text-break">
					<?php echo $serie["auteur"]; ?>
				  </div>
				  <div class="text-justify text-break">
					<?php echo $type["description"]; 
					if(countTagsSerie($serie['id_serie'])!=0) {
					echo ', ';
					$tags = getTagsBySerie($serie['id_serie']); 
					foreach($tags as $tag) echo $tag['description'].' '; }?>
				  </div>
				</div>
				<div class="col-3" style="padding:5px;">
					<a href="controleur.php?action=validSerie&serie=<?php echo $serie["id_serie"]; ?>">Accepter la proposition</a><br/>
					<a id="#supprPropos" href="#" onclick="$('#id_propos_form<?php echo $serie['id_serie']; ?>').val('<?php echo $serie["id_serie"]; ?>')">Refuser la proposition</a>
				</div>
			</div>
			</div>
		  </li>
	</div>
	<div class="border-right border-left border-bottom" style="border-radius: 5px;">
		<div id="collapse<?php echo $nb; ?>" class="collapse" aria-labelledby="heading<?php echo $nb; ?>" data-parent="#accordionSerie">
			<div class="card-body">
			<?php 	
			foreach ($tomes as $tome) {
			 ?>
			  <li class="media shadow-sm customli">
			  <?php if(isset($tome["photo"]	)) { ?>
				<img src="<?php echo $tome["photo"]; ?>" alt="Image de profil de <?php echo $tome["titre"]; ?>" class="mr-3" height="64px" width="auto">
				<?php } else { ?>
				<img src="bookpics/default.png" class="mr-3" height="64px" width="auto">
				<?php } ?>
				<div class="media-body">
				<div class="row">
					<div class="col-9" style>
					 <h5 class="mt-0 mb-1 text-break"> 
					 <a class="text-decoration-none text-reset" href="index.php?view=serie&tome=<?php echo $tome['id_tome']; ?>"><?php echo $tome["titre"]; ?></a> <br/>
					 </h5>
					  <div class="text-justify text-break">
						Tome <?php echo $tome["numtome"]; ?>
					  </div>
					</div>
					<div class="col-3" style="padding:5px;">
						<!--<a href="index.php?view=serie&tome=<?php echo $tome['id_tome']; ?>">Accéder au livre</a> <br/>-->
					</div>
				</div>
				</div>
			  </li>
			 <?php } ?>
			</div>
		</div>
	</div>

	<?php } ?>
</div>
	<br/>

	
	
<script>
$('a[id$="#supprPropos"]').on( "click", function() {
	$('#supprPropos').modal('show');
});</script>