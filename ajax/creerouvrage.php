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
		if(mkSerie($nomSerie, $auteurSerie, $typeSerie, $actif)) { //Si la série a bien été créée
		$idserie=getseriebyall($nomSerie, $auteurSerie, $typeSerie, $actif);
		$numtome = 1; //On mets dans les variables les valeurs reçu dans le formulaire
		$titre = valider('nomSerie');
		$desc = '';
		$desc = valider('desc');
		if(valider('nbtome')) $nbtome = valider('nbtome'); else $nbtome=0;
		if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
		{
			if ($_FILES['photo']['size'] <= 10000000)
			{
				// Testons si l'extension est autorisée
				$infosfichier = pathinfo($_FILES['photo']['name']);
				$extension_upload = $infosfichier['extension'];
				$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
				if (in_array($extension_upload, $extensions_autorisees))
				{
					// On peut valider le fichier et le stocker définitivement
					$photo = iconv('UTF-8', 'ASCII//TRANSLIT', 'bookpics/' . $idserie.'.'.$infosfichier['extension']);
					$photo = strtr($photo, " ", "_");
					move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
				}
			}
		}
		else $photo="bookpics/default.png";
		mkTome($idserie, $numtome, $titre, $desc, $photo, $nbtome);
		}
	} else echo "Error"; //On signale que la fonction n'a pas marché


?>