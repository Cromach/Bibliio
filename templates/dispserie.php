<form action="controleur.php" method="POST"> 
<input type="hidden" name="id_livre" value="<?php echo $id_tome; ?>">
<div class="modal fade" id="listepersoadd" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter à votre liste</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
		Selectionnez la liste dans laquelle vous voulez ajouter ce livre :
		  <select class="custom-select" name="selectListe">
			<option value='1'>Lu</option>
			<option value='2'>En cours de lecture</option>
			<option value='3'>À lire</option>
		  </select>
	   </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="action" value="ajouterListePerso"> Ajouter </button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="controleur.php" method="POST"> 
<input type="hidden" name="id_livre" value="<?php echo $id_tome; ?>">
<div class="modal fade" id="listepersotoread" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter à votre liste</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		Voulez vous ajouter ce livre dans votre liste de livres en cours de lecture ?
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="action" value="Emprunter"> Non </button>
        <button type="submit" class="btn btn-primary" name="action" value="ajouterListePersoToRead"> Oui </button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="controleur.php" method="POST"> 
<input type="hidden" name="id_livre" value="<?php echo $id_tome; ?>">
<div class="modal fade" id="listepersoread" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter à votre liste</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		Voulez vous ajouter ce livre dans votre liste de livres lus ?
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="action" value="Rendre"> Non </button>
        <button type="submit" class="btn btn-primary" name="action" value="ajouterListePersoRead"> Oui </button>
      </div>
    </div>
  </div>
</div>
</form>

<form action="controleur.php" method="POST"> 
<input type="hidden" name="id_livre" value="<?php echo $id_tome; ?>">
<div class="modal fade" id="listepersosuppr" tabindex="-1" role="dialog" aria-hidden="true">
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
        <button type="submit" class="btn btn-primary" name="action" value="retirerListePerso"> Retirer </button>
      </div>
    </div>
  </div>
</div>
</form>

<div class="page-header">
  <h1 class="mr-2" style="display: inline-block;"><?php echo $serie["titre"]; ?> </h1>
   <?php if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
	echo '<a href="index.php?view=serie&tome='.$id_tome.$toggle.'" class="text-reset text-decoration-none"><i class="fa fa-edit"></i></a>'; } ?>
   
</div><br/>
	
<div class="lead">
	
	<div class="row">
		<div class="col-4">
		  <img src="<?php echo $livre["photo"]; ?>" alt="Image de <?php echo $livre["titre"] ?>" height="450px" width="291px" />
			<form action="controleur.php" method="POST">
				<input type="hidden" name="livre" value="<?php echo $id_tome; ?>">
				<?php if (valider("connecte","SESSION")) { 
				if(checkEmprunt($self['id_user'], $id_tome)==0) $value = checkDispo($id_tome, $_SESSION['idUser']);
				else if (checkEmprunt($self['id_user'], $id_tome)==1) $value = 'value="Rendre"';
				else if (checkEmprunt($self['id_user'], $id_tome)==2) $value = 'value="En attente" disabled';?>
				
				<div class="btn-group dropdown" style="width: 291px;">
				<?php if($value=='value="Emprunter"' && !inList12($self['id_user'], $id_tome)) {?>
					 <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#listepersotoread" style="width: 90%;">Emprunter</button><br/>
					<?php } else if($value=='value="Rendre"' &&!inList1($self['id_user'], $id_tome)) {?>
						 <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#listepersoread" style="width: 90%;">Rendre</button><br/>
					<?php } else { ?>
						<input type="submit" class="btn btn-primary" name="action" <?php echo $value; ?> style="width: 90%;" /><br/>
					<?php } ?>
				  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 10%;">
					<span class="sr-only">Toggle Dropdown</span>
				  </button>
				  <div class="dropdown-menu dropdown-menu-right">
					<?php if(inList($_SESSION['idUser'], $id_tome)) { ?>
					<button class="dropdown-item" type="button" data-toggle="modal" data-target="#listepersosuppr">Retirer de votre liste</button>
					<?php } else { ?>
					<button class="dropdown-item" type="button" data-toggle="modal" data-target="#listepersoadd">Ajouter à votre liste</button>
					<?php } ?>
				  </div>
				</div>
				
				<?php } ?>
			</form>
		</div>
		<div class="col-8">
		  <div class="row">
		   <?php if ($nbtome>1) { ?>
			<div class="col-md-7 font-weight-bolder" style="padding-left:0">
			Tome <?php echo $livre["numtome"].' : ' ?> <br/> 
			<?php echo $livre["titre"]; ?> 
			</div> 
			<div class="col-md-5">
			Choisir un autre tome : <br/>
			<select id="choisirTome" onChange="location.href='index.php?view=serie&tome='+this.options[this.selectedIndex].value;">
					<?php
					$livres = getTomes($serie['id_serie']);
					foreach ($livres as $tome)
					{
						if ($_GET['tome'] === $tome['id_tome']) echo "<option value=\"$tome[id_tome]\" selected>";
						else echo "<option value=\"$tome[id_tome]\">";
						echo  $tome["titre"];
						echo "</option>";
					}
					?>
			</select>
			</div>
			<?php } ?>
		  </div><br/>
		  <div class="row font-weight-bolder">
			  <?php echo 'Auteur : '.$serie["auteur"]; ?>
			</div> <br />
			<?php
				if(countTagsSerie($serie['id_serie'])!=0) { ?>
		  <div class="row text-justify text-break">
			<span class="font-weight-bolder"> Tags :&nbsp</span>
			<?php $tags = getTagsBySerie($serie['id_serie']); 
				foreach($tags as $tag) echo ' '.$tag['description']; ?>
		  </div> <br />
			<?php } ?>
		  <div class="row text-justify text-break">
			<?php echo $livre["description"]; ?>
		  </div>
		</div>
	</div> <br/>

	
	<div>
		<ul class="list-unstyled">
		<?php 
		$rateid = array ('starhalfdisp', 'star1disp', 'star1halfdisp', 'star2disp', 'star2halfdisp', 'star3disp', 'star3halfdisp', 'star4disp', 'star4halfdisp', 'star5disp');

		if (valider("connecte","SESSION")) { ?>
		<div class="font-weight-bolder">
			Votre avis :
		</div>
		<?php if (checkComment($self['id_user'], $id_tome)) { 
		$usercomment = getCommentairesByUser($self['id_user'], $id_tome);
		?>
		<li class="media shadow-sm customli">
			<img src="<?php echo $self["profilpic"]; ?>" alt="Image de de profil de <?php echo $self["prenom"] ?>" class="mr-3" height="64px" width="64px">
			<div class="media-body">
			<div class="row">
				<div class="col-9" style>
				 <h5 class="mt-0 mb-1"><?php echo $self["prenom"]; ?></h5>
				  <div class="text-justify text-break">
					<?php echo $usercomment["com"]; ?>
				  </div>
				</div>
				<div class="col-3" style="padding:5px;">
					<fieldset class="ratingdisp">
							<?php
								for($rate = 10; $rate > 0; $rate--) 
								{
									$label = ($rate%2==0) ? 'full' : 'half';
									$checked = ($rate==$usercomment["note"]) ? 'checked="checked"' : '';
									echo '<input type="radio" id="'.$rateid[$rate-1].'" name="ratingdisp'.$usercomment['id_com'].'" value="'.$rate.'" disabled '.$checked.' /><label class = "'.$label.'" for="'.$rateid[$rate-1].'"></label>';
								}
							?>
					</fieldset>
					<a href="controleur.php?action=rmComment&tome=<?php echo $id_tome; ?>">Supprimer le commentaire</a>
				</div>
			</div>
			</div>
		  </li>
		<?php }
		else { ?>
		<form action="controleur.php" method="POST">
		  <input type="hidden" name="livre" value="<?php echo $id_tome; ?>">
		  <li class="media shadow-sm customli">
			<img src="<?php echo $self["profilpic"]; ?>" alt="Image de de profil de <?php echo $self["prenom"] ?>" class="mr-3" height="64px" width="64px">
			<div class="media-body">
			<div class="row">
				<div class="col-9">
				 <h5 class="mt-0 mb-1"><?php echo $self["prenom"]; ?></h5>
				 <div class="input-group">
				  <textarea class="form-control" name="com" rows="3" cols="45"></textarea>
				</div>
				</div>
				<div class="col-3">
					<fieldset class="rating">
						<input type="radio" id="star5" name="rating" value="10" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
						<input type="radio" id="star4half" name="rating" value="9" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
						<input type="radio" id="star4" name="rating" value="8" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
						<input type="radio" id="star3half" name="rating" value="7" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
						<input type="radio" id="star3" name="rating" value="6" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
						<input type="radio" id="star2half" name="rating" value="5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
						<input type="radio" id="star2" name="rating" value="4" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
						<input type="radio" id="star1half" name="rating" value="3" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
						<input type="radio" id="star1" name="rating" value="2" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
						<input type="radio" id="starhalf" name="rating" value="1" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
					</fieldset>
					<input type="submit" class="btn btn-primary btn-lg" name="action" value="Envoyer votre avis"/>
				</div>
			</div>
			</div>
		  </li>
		  </form>
		  <?php } ?>
		<?php } 
		$nbComment = getCommentCount($id_tome, $self['id_user']);?>
		<br/>
		<div class="font-weight-bolder">
			L'avis des utilisateurs (<?php echo $nbComment; ?> avis) :
		</div>
			<?php
			
			if($nbComment==0) {
				echo '<div class="offset-1">Aucun utilisateur n\'a donné son avis</div>';
			}
			
	$commentaires = getCommentaires($id_tome);
	foreach ($commentaires as $commentaire)
	{ 
	$user = getUserByID($commentaire['id_user']); 
	if($user!=$self) {
	?>
		  <li class="media shadow-sm customli">
			<img src="<?php echo $user["profilpic"]; ?>" alt="Image de de profil de <?php echo $user["prenom"] ?>" class="mr-3" height="64px" width="64px">
			<div class="media-body">
			<div class="row">
				<div class="col-9" style>
				 <h5 class="mt-0 mb-1 text-break"><?php echo $user["prenom"]; ?></h5>
				  <div class="text-justify text-break">
					<?php echo $commentaire["com"]; ?>
				  </div>
				</div>
				<div class="col-3" style="padding:5px;">
					<fieldset class="ratingdisp">
							<?php
								for($rate = 10; $rate > 0; $rate--) 
								{
									$label = ($rate%2==0) ? 'full' : 'half';
									$checked = ($rate==$commentaire["note"]) ? 'checked="checked"' : '';
									echo '<input type="radio" id="'.$rateid[$rate-1].'" name="ratingdisp'.$commentaire['id_com'].'" value="'.$rate.'" disabled '.$checked.' /><label class = "'.$label.'" for="'.$rateid[$rate-1].'"></label>';
								}
							?>
					</fieldset>
					<?php if (valider("connecte","SESSION") && valider("admin","SESSION")==1) { ?><a href="controleur.php?action=rmCommentAdmin&tome=<?php echo $id_tome; ?>&user=<?php echo $user["id_user"]; ?>">Supprimer le commentaire</a> <?php } ?>
				</div>
			</div>
			</div>
		  </li>
	<?php
		}
	}
	?>
		</ul>
	</div>

	
</div>
