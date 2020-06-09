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
	$search = valider('search') ? valider('search') : "";
?>

<div id="stuff-filters" class="menu p-4" style="width 100%;">    
	<div class="row">
		<div class="col-3">
			  <select class="custom-select select-filter" name="typeFilter" id="typeFilter">
					<option value="">Choisir un type à filtrer</option>
					<?php
					$types = getTypes();
					foreach ($types as $type)
					{
						echo "<option value=\"id_type=$type[id_type]\">";
						echo  $type["description"];
						echo "</option>"; 
					}
					?>
			  </select> <br/> <br/>
			  Nombre d'entrées par page :
			  <select class="custom-select select-filter" name="nbSeriePage" id="nbSeriePage">
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="20" selected>20</option>
			  </select>			  
		</div>
		<div class="col-6">
		</div>
		<div class="col-3">
			<input class="form-control search mr-4" value="<?php echo $search; ?>" type="text" placeholder="Rechercher" aria-label="Rechercher"> <br/> <br/> <br/>
			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" value="dispRate" id="dispRate">
			  <label class="custom-control-label" for="dispRate">Afficher les notes (Augmente le temps de chargement)</label>
			</div>
		</div>
	</div>
	<button type="button" class="btn btn-primary m-3" onclick="$('#filtretab').toggle();">Filtrer par tag</button>

	<div class="row menu mt-3 py-2" style="display: none;" id="filtretab">
		<div class="col-6 mt-3" id="filterstag">
		Tag séléctionnés :
		</div>
		<div class="col-6">
		Filtrer par tag
		<div class="input-group mb-3">
			<select class="custom-select" name="addTag" id="selectTag">
					<option value="">Selectionner un tag</option>
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
			<button type="button" class="btn btn-primary mx-3" id="addTag">Ajouter le tag</button>
		</div>
			<button type="button" class="btn btn-primary mx-3" id="rmvTag">Réinitialiser les tags</button>
		</div>
	</div>
</div>

<input type="hidden" id="hiddencontainer" name="hiddencontainer"/> <br/>
<br/>
<p>Nombre de resultats : <span id="nbserie"> <?php echo getSeriesCount("", "", true); ?></span></p>
<ul class="list-unstyled">
<div class="accordion" id="accordionSerie">

</div>
</ul>

<input type="hidden" id="hiddenpage" name="hiddenpage" value="1"/>

<nav id="pagination" aria-label="Page navigation">
	<ul class="pagination justify-content-center">
		<li class="page-item page-down" id="previouspageli">
			<a class="page-link shadow-none" id="previouspage" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<li class="page-item page-number active" id="pageinfli" ><a class="page-link shadow-none" id="pageinf" href="#">1</a></li>
		<li class="page-item page-number" id="pagemidli"><a class="page-link shadow-none" id="pagemid" href="#">2</a></li>
		<li class="page-item page-number" id="pagesupli"><a class="page-link shadow-none" id="pagesup" href="#">3</a></li>
		<li class="page-item page-up" id="nextpageli">
			<a class="page-link shadow-none" id="nextpage" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</nav>

<script src="js/search.js"></script>