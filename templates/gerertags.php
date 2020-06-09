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
	$tomes = getTomes($serie['id_serie']);
?>

<?php if(valider("admin","SESSION")==1) { ?>
    <div class="page-header">
      <h2>Tags de <?php echo $serie['titre']; ?> </h2>
    </div> <br/>
	Tags actuels : <?php $tags = getTagsBySerie($idserie);  
	foreach($tags as $tag) { ?>
	<a href="controleur.php?action=rmTag&serie=<?php echo $idserie; ?>&tag=<?php echo $tag['id_tag']; ?>"><?php echo $tag['description']; ?></a> 
	<?php } ?>
	
	<form action="controleur.php" method="POST" class="menu p-4">
		<input type="hidden" name="idserie" value="<?php echo $idserie; ?>">
		<select class="custom-select" name="addTag">
				<?php
				$tags = getTags();
				foreach ($tags as $tag)
				{
					echo "<option value=\"$tag[id_tag]\">";
					echo  $tag["description"];
					echo "</option>"; 
				}
				?>
		</select>
		
		<input type="submit" class="btn btn-primary btn-lg mt-3" name="action" value="Ajouter le tag"/>
		<a href="index.php?view=serie&tome=<?php echo $tomes[0]['id_tome']; ?>" class="btn btn-primary btn-lg mt-3">Aller sur la page de la série</a>
		
	</form>

<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>