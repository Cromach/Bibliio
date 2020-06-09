<?php

	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	include_once "../libs/modele.php";

	if ($nomSerie = valider('nomSerie') && $auteurSerie = valider('auteurSerie') && $typeSerie = valider('typeSerie')) // Onvérifie que toutes ces valeurs sont définies
	{
		$nomSerie = valider('nomSerie'); //On mets dans les variables les valeurs reçu dans le formulaire
		$auteurSerie = valider('auteurSerie');
		$typeSerie = valider('typeSerie');
		$actif = 1;
		mkSerie($nomSerie, $auteurSerie, $typeSerie, $actif); //On créer la série
	}
	else echo "Error"; //On signale que la fonction n'a pas marché


?>