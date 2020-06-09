<?php 
	include_once "../libs/modele.php";
	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	
	$filtres = valider('filtres');
	$id_user = valider('id_user');
	$page = valider('page');
	$page = $page-1;
	
	$tomes = getTomeInList($id_user, $filtres);
	$rateid = array ('starhalfdisp', 'star1disp', 'star1halfdisp', 'star2disp', 'star2halfdisp', 'star3disp', 'star3halfdisp', 'star4disp', 'star4halfdisp', 'star5disp');
	foreach ($tomes as $tome) {
			 ?>
			 
	<form action="controleur.php" method="POST"> 
	<input type="hidden" name="id_livre" value=<?php echo $tome["id_tome"]; ?>>
	<div class="modal fade" id="listepersosuppr<?php echo $tome["id_tome"]; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Retirer de votre liste</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Voulez vous vraiment retirer ce livre de votre liste ?
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			<button type="submit" class="btn btn-primary" name="action" value="retirerListePersolp"> Retirer </button>
		  </div>
		</div>
	  </div>
	</div>
	</form>


  <form action="controleur.php" method="POST">
  <li class="media shadow-sm customli list<?php echo $tome["liste"]; ?>">
  <input type="hidden" name="livre" value="<?php echo $tome["id_tome"]; ?>"/>
  <input type="hidden" name="id_livre" value="<?php echo $tome["id_tome"]; ?>"/>
  <?php if(isset($tome["photo"]	)) { ?>
	<img src="<?php echo $tome["photo"]; ?>" alt="Image de couverture de <?php echo $tome["titre"]; ?>" class="mr-3" height="64px" width="auto">
	<?php } else { ?>
	<img src="bookpics/default.png" class="mr-3" height="64px" width="auto">
	<?php } ?>
	<div class="media-body">
	<div class="row">
		<div class="col-7">
		 <h5 class="mt-0 mb-1 text-break"> 
		 <a class="text-decoration-none text-reset" href="index.php?view=serie&tome=<?php echo $tome['id_tome']; ?>"><?php echo $tome["titre"]; ?></a> <br/>
		 </h5>
		  <div class="text-justify text-break">
			Tome <?php echo $tome["numtome"]; ?>
		  </div>
		</div>
		<div class="col-3">
			<?php if(getRate($id_user, $tome['id_tome'])) { ?>
			<fieldset class="ratingdisp">
			<?php 
				for($rate = 10; $rate > 0; $rate--) 
					{
						$label = ($rate%2==0) ? 'full' : 'half';
						$checked = ($rate==round(getTomeAvgRate($tome["id_tome"]))) ? 'checked="checked"' : '';
						echo '<input type="radio" id="'.$rateid[$rate-1].'" name="ratingdisptome'.$tome['id_tome'].'" value="'.$rate.'" disabled '.$checked.' /><label class = "'.$label.'" for="'.$rateid[$rate-1].'"></label>';
					}  ?>
			
			</fieldset>
			<?php } ?>
		</div>
		<div class="col-2 pt-3">
			<div class="dropdown">
			  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Actions
			  </a>

			  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				<?php if(checkEmprunt($id_user, $tome["id_tome"])==0) 
				{
					if(getUserNbEmprunts($id_user)<5) echo '<a class="dropdown-item" href="controleur.php?action=empruntlisteperso&livre='.$tome["id_tome"].'">Emprunter</a>';
				}
				if(checkEmprunt($id_user, $tome["id_tome"])==1) 
				{
					echo '<a class="dropdown-item" href="controleur.php?action=rendrelisteperso&livre='.$tome["id_tome"].'">Rendre</a>';
				} ?>
				<button class="dropdown-item" type="button" data-toggle="modal" data-target="#listepersosuppr<?php echo $tome["id_tome"]; ?>">Retirer de votre liste</button>
			  </div>
			</div>
		</div>
	</div>
	</div>
  </li>
  </form>
 <?php } ?>