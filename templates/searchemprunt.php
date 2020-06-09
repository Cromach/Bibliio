<div id="searchresult">
<?php 
	include_once "../libs/modele.php";
	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 

	$filtres = valider('filtres');
	$search = valider('search');
	$nbEmpruntPage = valider('nbEmpruntPage');
	$page = valider('page');
	$page = $page-1;
	$emprunts = getAllEmprunts($filtres, $search, $nbEmpruntPage, $page);
	foreach ($emprunts as $emprunt){
		$user = getUserByID($emprunt['id_user']);
		$livre = getTomeById($emprunt['id_tome']);
		$date1 = new DateTime("now");
		$date2 = new DateTime($emprunt["date_limite"]);     
		$actifdisp = ($emprunt["actif"]==1) ? 'Oui' : 'Non';
		$inactifcolor = ($emprunt["actif"]==0) ? 'color: #b5b5b5;' : '';
		$verifcolor = ($emprunt["actif"]==2) ? 'color: #8ca0ff;' : '';
		$actif = ($emprunt["actif"]==1) ? 'actif' : '';
		$retardcolor = ($date2<$date1 && $emprunt["actif"]==1) ? 'color: red;' : '';
		$retard = ($date2<$date1 && $emprunt["actif"]==1) ? 'retard' : '';
	 ?>
	<div class="media" style="<?php echo $retardcolor; echo $inactifcolor; echo $verifcolor; ?>">
		<div class="media-body">
		<div class="row">
			<div class="titre col-4 text-break">
			<a class="text-decoration-none text-reset" href="index.php?view=serie&tome=<?php echo $livre['id_tome']; ?>"><?php echo $livre["titre"]; ?></a>
			</div>
			<div class="login col-2 text-break">
				<span data-toggle="tooltip" data-placement="top" title="<?php echo $emprunt["nom"].' '.$emprunt["prenom"]; ?>"><?php echo $emprunt["login"]; ?></span>
			</div>
			<div class="actifsort col-1">
				<?php echo $actifdisp; ?>
			</div>
			<div class="date col-2" >
				<?php echo $emprunt["date"]; ?>
			</div>
			<div class="datelimite col-2" >
				<?php echo $emprunt["date_limite"]; ?>
			</div>
			<div class="col-1" >
			<?php if($emprunt["actif"]>0) { 
				$actifbutton = ($emprunt["actif"]==1) ? 'Annuler l\'emprunt' : 'Confirmer restitution';?>
				<a href="controleur.php?action=adminRendre2&tome=<?php echo $livre['id_tome'];?>&user=<?php echo $emprunt['id_user'];?>"><?php echo $actifbutton;?></a>
			<?php } ?>
			</div>
		</div>
		</div>
	</div>
	<hr>
	<?php } ?>
</div>
	<br/>

<script>
		
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
</script>
