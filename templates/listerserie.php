<?php 
$page = valider('page') ? valider('page') : 1;
?>

<br/>

<div id="stuff-filters" class="row">    
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
	<input class="form-control search mr-4" type="text" placeholder="Rechercher" aria-label="Rechercher">
	</div>
</div>
<input type="hidden" id="hiddencontainer" name="hiddencontainer"/> <br/>

<p>Nombre de resutats : <span id="nbserie"> <?php echo getSeriesCount(); ?></span></p>
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

<script src="js/searchadmin.js"></script>