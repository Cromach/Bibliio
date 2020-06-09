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
	$dispRate = true;
?>

<input type="hidden" id="hiddeniduser" name="hiddeniduser" value="<?php echo $_SESSION['idUser']?>"/>

    <div class="page-header">
      <h1>Votre liste de lecture</h1>
    </div> <br/>

    <div class="list-group list-group-horizontal" role="tablist">
      <a class="list-group-item list-group-item-action show active" id="tout" data-toggle="list" href="#" role="tab" aria-controls="tout">Tout</a>
      <a class="list-group-item list-group-item-action" id="lu" data-toggle="list" href="#" role="tab" aria-controls="lu">Lus</a>
      <a class="list-group-item list-group-item-action" id="encours" data-toggle="list" href="#" role="tab" aria-controls="encours">En cours de lecture</a>
      <a class="list-group-item list-group-item-action" id="alire" data-toggle="list" href="#" role="tab" aria-controls="alire">À lire</a>
    </div> <br/><br/><br/>

<ul class="list-unstyled">
<div id="listelivres">


</div>
</ul>

<input type="hidden" id="nbLivre" name="nbLivre" value="<?php echo getTomeInListCount($_SESSION['idUser']); ?>"/>
<input type="hidden" id="hiddenfiltre" name="hiddenfiltre"/>
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

<script src="js/searchlisteperso.js"></script>