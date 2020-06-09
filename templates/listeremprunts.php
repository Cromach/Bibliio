<?php 
$page = valider('page') ? valider('page') : 1;
?>

<br/>

<div id="stuff-filters" class="row">    
	<div class="col-3">
		  <select class="custom-select select-filter" name="typeFilter" id="actifFilter">
				<option value="">Choisir un statut à filtrer</option>
				<option value="DATE_ADD(t1.date, INTERVAL 7 DAY) < NOW() AND t1.actif>1">Retard</option>
				<option value="t1.actif=0">Inactif</option>
				<option value="t1.actif=1">Actif</option>

		  </select> <br/> <br/>
		  Nombre d'entrées par page :
		  <select class="custom-select select-filter" name="nbSeriePage" id="nbEmpruntPage">
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

<p>Nombre de résultats : <span id="nbserie"> <?php echo getEmpruntsCount(); ?></span></p>
<ul class="list-unstyled">
	<div class="media-body">
		<div class="row">
			<div class="col-4">
				Livres empruntés
			 </button>
			</div>
			<div class="col-2">
				Emprunteur
			</button>
			</div>
			<div class="col-1">
				Actif
			</button>
			</div>
			<div class="col-2">
				Date d'emprunt
			</button>
			</div>
			<div class="col-2" >
				Date limite
			</button>
			</div>
		</div>
	</div>
	<hr>
<div id="listemprunt">

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

<script src="js/searchemprunt.js"></script>