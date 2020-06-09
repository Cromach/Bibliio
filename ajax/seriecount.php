<?php

	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	include_once "../libs/modele.php";

	$filtres = valider('filtres');
	$search = valider('search');
	$debug = valider('debug');
	$tags = valider('tags');
	
	echo getSeriesCount($filtres, $search, $debug, $tags);
	
?>