<?php

	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	include_once "../libs/modele.php";

	if ($nom = valider('nom') && $prenom = valider('prenom') && $naissance = valider('naissance')) // Onvérifie que toutes ces valeurs sont définies
	{
		$nom = valider('nom'); //On mets dans les variables les valeurs reçu dans le formulaire
		$prenom = valider('prenom');
		$naissance = valider('naissance');
		$mail = valider('mail'); //On mets dans les variables les valeurs reçu dans le formulaire
		$tel = valider('tel');
		$adresse = valider('adresse');
		if(valider ('admin')) $admin = 1; else $admin = 0;		
		mkUser($nom, $prenom, $photo="profilpics/default-avatar.png", $naissance, $mail, $tel, $adresse, $admin); //On créer le user
	}
	else echo "Error"; //On signale que la fonction n'a pas marché


?>