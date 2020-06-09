<?php

	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	include_once "../libs/modele.php";

	$filtres = valider('filtres');
	$id_user = valider('id_user');
	
	echo getTomeInListCount($id_user, $filtres);
	
?>

