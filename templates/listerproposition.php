<?php 
$page = valider('page') ? valider('page') : 1;
?>

<br/>

<div id="stuff-filters" class="row">    
	<div class="col-3">
		  <select class="custom-select select-filter-propos" name="typeFilterPropos" id="typeFilterPropos">
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
		  <select class="custom-select select-filter-propos" name="nbSeriePagePropos" id="nbSeriePagePropos">
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="20" selected>20</option>
		  </select>			  
	</div>
	<div class="col-6">
	</div>
	<div class="col-3">
	<input class="form-control search-propos mr-4" type="text" placeholder="Rechercher" aria-label="Rechercher">
	</div>
</div>
<input type="hidden" id="hiddencontainer" name="hiddencontainer"/> <br/>

<p>Nombre de resutats : <span id="nbseriepropos"> <?php echo getProposCount(); ?></span></p>
<ul class="list-unstyled">
<div class="accordion" id="accordionpropos">

</div>
</ul>

<input type="hidden" id="hiddenpagepropos" name="hiddenpagepropos" value="1"/>

<nav id="paginationPropos" aria-label="Page navigation">
	<ul class="pagination justify-content-center">
		<li class="page-item page-down-propos" id="previouspagelipropos">
			<a class="page-link shadow-none" id="previouspagepropos" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<li class="page-item page-number-propos active" id="pageinflipropos" ><a class="page-link shadow-none" id="pageinfpropos" href="#">1</a></li>
		<li class="page-item page-number-propos" id="pagemidlipropos"><a class="page-link shadow-none" id="pagemidpropos" href="#">2</a></li>
		<li class="page-item page-number-propos" id="pagesuplipropos"><a class="page-link shadow-none" id="pagesuppropos" href="#">3</a></li>
		<li class="page-item page-up-propos" id="nextpagelipropos">
			<a class="page-link shadow-none" id="nextpagepropos" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</nav>

<script src="js/searchproposition.js"></script>