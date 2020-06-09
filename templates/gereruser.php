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
      <h1>Gérer les utilisateurs</h1>
    </div> <br/>
	
<div>
    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action show active" id="gererusers-list" data-toggle="list" href="#gererusers" role="tab" aria-controls="gererusers">Gérer les utilisateurs</a>
      <a class="list-group-item list-group-item-action"  id="creeruser-button" data-toggle="list" href="#creeruser" role="tab" aria-controls="profile">Créer un utilisateur</a>      
    </div> <br/>
  </div>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="gererusers" role="tabpanel" aria-labelledby="gererusers-list">
	  <?php include("templates/listeruser.php");?> 
	  </div>
      <div class="tab-pane fade" id="creeruser" role="tabpanel" aria-labelledby="creeruser">
	  <?php include("templates/creeruser.php");?>
	  </div>
    </div>
  </div>
</div>


<?php } 
else echo "Vous n'avez pas les droits pour afficher cette page";?>


