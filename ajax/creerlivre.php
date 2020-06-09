<?php

	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	include_once "../libs/modele.php";

	if ($titre = valider('titre') && $numtome = valider('numtome') && $idserie = valider('idserie')) // Onvérifie que toutes ces valeurs sont définies
	{
		$idserie = valider('idserie');
		$serie = getSeriesByID($idserie);
		$titreSerie = $serie['titre'];
		$numtome = valider('numtome'); //On mets dans les variables les valeurs reçu dans le formulaire
		$titre = valider('titre');
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
					$photo = iconv('UTF-8', 'ASCII//TRANSLIT', 'bookpics/' . $idserie.'_'.$numtome.'.'.$infosfichier['extension']);
					$photo = strtr($photo, " ", "_");
					move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
				}
			}
		}
		else $photo="bookpics/default.png";
		mkTome($idserie, $numtome, $titre, $desc, $photo, $nbtome);
	} else echo "Error"; //On signale que la fonction n'a pas marché


?>