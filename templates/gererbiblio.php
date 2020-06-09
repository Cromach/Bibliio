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
	$tab = valider('tab');
?>


<?php if(valider("admin","SESSION")==1) { ?>

    <div class="page-header">
      <h1>Gérer la bibliothèque</h1>
    </div> <br/>
	
<div>
    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action show active" id="gererserie-list" data-toggle="list" href="#gererserie" role="tab" aria-controls="home">Gérer les séries</a>
      <a class="list-group-item list-group-item-action"  id="creerserie-button" data-toggle="list" href="#creerserie" role="tab" aria-controls="profile">Créer une série</a>
	  <a class="list-group-item list-group-item-action" id="list-ouvrage-list" data-toggle="list" href="#list-ouvrage" role="tab" aria-controls="ouvrage">Créer un ouvrage</a>     
	  <a class="list-group-item list-group-item-action" id="list-propos-list" data-toggle="list" href="#list-propos" role="tab" aria-controls="propos">Gérer les propositions</a>
      
    </div> <br/>
  </div>
    <div class="tab-content" id="nav-tabContent">
     <div class="tab-pane fade show active" id="gererserie" role="tabpanel" aria-labelledby="gererserie-list">
	  <?php include("templates/listerserie.php");?> 
	  </div>
      <div class="tab-pane fade" id="creerserie" role="tabpanel" aria-labelledby="creerserie">
	  <?php include("templates/creerserie.php");?>
	  </div>
      <div class="tab-pane fade" id="list-ouvrage" role="tabpanel" aria-labelledby="list-ouvrage-list">
	  <?php include("templates/creerouvrage.php");?> 
	  </div>
      <div class="tab-pane fade" id="list-propos" role="tabpanel" aria-labelledby="list-propos-list">
	  <?php include("templates/listerproposition.php");?> 
	  </div>
    </div>
  </div>
</div>


<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>


