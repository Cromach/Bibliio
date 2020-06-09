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
	$adminMod = valider('edit');
	$toggle = ($adminMod==0) ? '&edit=1' : '';
	$id_tome = valider('tome');
	if($id_tome = valider('tome')) {
	$livre = getTomeById($id_tome);
	$serie = getSeriesByID($livre['id_serie']);
	$nbtome = getTomesCount($serie['id_serie']);
	if (valider("connecte","SESSION")) $self = getUserByID($_SESSION["idUser"]);
	else $self = null; }
?> 


<?php 
if(!$id_tome = valider('tome')) echo "Cette page n'existe pas";
else if($adminMod==0) include("templates/dispserie.php"); 
else if($adminMod==1 && valider("admin","SESSION")==1) include("templates/editserie.php");
else if($adminMod==1 && valider("admin","SESSION")!=1) echo "Vous n'avez pas les droits pour éditer cette page";
else echo"Cette page n'existe pas"; ?>