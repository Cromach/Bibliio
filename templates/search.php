<div id="searchresult">
<?php 
	include_once "../libs/modele.php";
	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	$filtres = valider('filtres');
	$search = valider('search');
	$tags = valider('tags');
	$nbSeriePage = valider('nbSeriePage');
	$page = valider('page');
	$page = $page-1;
	$series = getSeries($filtres, $search, $nbSeriePage, $page, true, $tags);
	$nb=0;
	$dispRate = valider('dispRate');
	foreach ($series as $serie) {
	$nb++;
	$tomes = getTomes($serie['id_serie']);
	$type = getTypeById($serie["id_type"]);
	$rateid = array ('starhalfdisp', 'star1disp', 'star1halfdisp', 'star2disp', 'star2halfdisp', 'star3disp', 'star3halfdisp', 'star4disp', 'star4halfdisp', 'star5disp');

	 ?>

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
				<div class="col-8" style>
				 <h5 class="mt-0 mb-1 text-break"> 
				 <?php if(getTomesCount($serie['id_serie'])>1) { ?>
				 <button class="btn btn-link text-decoration-none" type="button" style="padding: 0; font-size: 1.25rem;" data-toggle="collapse" data-target="#collapse<?php echo $nb; ?>" aria-expanded="true" aria-controls="collapse<?php echo $nb; ?>">
				 <?php echo $serie["titre"]; ?>                                                       
				 </button>
				 <?php } else {  ?>
				 <a class="text-decoration-none text-reset" href="index.php?view=serie&tome=<?php echo $tomes[0]['id_tome']; ?>"> <?php echo $serie["titre"]; ?> </a>
				 <?php } ?>
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
					<?php if($dispRate) { ?>
					<?php if(getTomesCount($serie['id_serie'])>0) { ?>
					<fieldset class="ratingdisp">
						<?php for($rate = 10; $rate > 0; $rate--) 
								{
									$label = ($rate%2==0) ? 'full' : 'half';
									$checked = ($rate==round(getSerieAvgRate($serie['id_serie']))) ? 'checked="checked"' : '';
									echo '<input type="radio" id="'.$rateid[$rate-1].'" name="ratingdispserie'.$serie['id_serie'].'" value="'.$rate.'" disabled '.$checked.' /><label class = "'.$label.'" for="'.$rateid[$rate-1].'"></label>';
								} ?>
					<?php }?>
					</fieldset>
					<?php } ?>
				</div>
				<div class="col-1" style="padding:5px;">
					<!--<a href="index.php?view=serie&tome=<?php echo $tomes[0]['id_tome']; ?>"> <?php echo $serie["titre"]; ?> </a>-->
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
					<div class="col-8" style>
					 <h5 class="mt-0 mb-1 text-break"> 
					 <a class="text-decoration-none text-reset" href="index.php?view=serie&tome=<?php echo $tome['id_tome']; ?>"><?php echo $tome["titre"]; ?></a> <br/>
					 </h5>
					  <div class="text-justify text-break">
						Tome <?php echo $tome["numtome"]; ?>
					  </div>
					</div>
					<div class="col-3">
						<?php if($dispRate) { ?>
						<fieldset class="ratingdisp">
						<?php for($rate = 10; $rate > 0; $rate--) 
								{
									$label = ($rate%2==0) ? 'full' : 'half';
									$checked = ($rate==round(getTomeAvgRate($tome["id_tome"]))) ? 'checked="checked"' : '';
									echo '<input type="radio" id="'.$rateid[$rate-1].'" name="ratingdisptome'.$tome['id_tome'].'" value="'.$rate.'" disabled '.$checked.' /><label class = "'.$label.'" for="'.$rateid[$rate-1].'"></label>';
								} ?>
						</fieldset>
						<?php } ?>
					</div>
					<div class="col-1" style="padding:5px;">
						<!--<a href="index.php?view=serie&tome=<?php echo $tome['id_tome']; ?>">Accéder</a> <br/>-->
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

