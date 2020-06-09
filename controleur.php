<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$addArgs = "";

	if ($action = valider("action"))
	{
		ob_start ();
		//echo "Action = '$action' <br />";
		// ATTENTION : le codage des caractères peut poser PB si on utilise des actions comportant des accents... 
		// A EVITER si on ne maitrise pas ce type de problématiques

		/* TODO: A REVOIR !!
		// Dans tous les cas, il faut etre logue... 
		// Sauf si on veut se connecter (action == Connexion)

		if ($action != "Connexion") 
			securiser("login");
		*/

		// Un paramètre action a été soumis, on fait le boulot...
		switch($action)
		{
			
			
			// Connexion //////////////////////////////////////////////////
			case 'Connexion' :
				// On verifie la presence des champs login et passe
				if ($login = valider("login"))
				if ($passe = valider("passe"))
				{
					$passe=sha1(md5($passe));
					// On verifie l'utilisateur, 
					// et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					if (verifUser($login,$passe)) {
						// tout s'est bien passé, doit-on se souvenir de la personne ? 
						if (isAdmin($_SESSION["idUser"]))
						{
							$_SESSION["admin"]=1;
						} else {
							$_SESSION["admin"]=0;
						}
						if (valider("remember")) {
							setcookie("login",$login , time()+60*60*24*30);
							setcookie("passe",$password, time()+60*60*24*30);
							setcookie("remember",true, time()+60*60*24*30);
						} else {
							setcookie("login","", time()-3600);
							setcookie("passe","", time()-3600);
							setcookie("remember",false, time()-3600);
						}

					}	
				}

			break;
			
			case 'Rechercher' :
				if (valider("connecte","SESSION")) {
					if ($search = valider('search'))
					{
						$search = valider('search');
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=rechercher&search=".$search;
						header("Location:" . $urlBase . $addArgs);
					}
					else
					{
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=rechercher";
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;	

			case 'Proposer la série' :
				if (valider("connecte","SESSION")) {
					if ($nomSerie = valider('nomSerie') && $auteurSerie = valider('auteurSerie') && $typeSerie = valider('typeSerie')) // Onvérifie que toutes ces valeurs sont définies
					{
						$nomSerie = valider('nomSerie'); //On mets dans les variables les valeurs reçu dans le formulaire
						$auteurSerie = valider('auteurSerie');
						$typeSerie = valider('typeSerie');
						$actif = 0;
						mkSerie($nomSerie, $auteurSerie, $typeSerie, $actif); //On créer la série
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=accueil";
						header("Location:" . $urlBase . $addArgs);
					}
				}

			break;

			case 'Proposer le livre' :
				if (valider("connecte","SESSION")) {
					if ($nomSerie = valider('nomSerie') && $auteurSerie = valider('auteurSerie') && $typeSerie = valider('typeSerie')) // Onvérifie que toutes ces valeurs sont définies
					{
						$nomSerie = valider('nomSerie'); //On mets dans les variables les valeurs reçu dans le formulaire
						$auteurSerie = valider('auteurSerie');
						$typeSerie = valider('typeSerie');
						$actif = 0;
						mkSerie($nomSerie, $auteurSerie, $typeSerie, $actif); //On créer la 
						$idserie=getseriebyall($nomSerie, $auteurSerie, $typeSerie, $actif);
						$numtome = 1; //On mets dans les variables les valeurs reçu dans le formulaire
						$titre = valider('nomSerie');
						$desc = '';
						$nbtome = -1;
						mkTome($idserie, $numtome, $titre, $desc, $photo="bookpics/default.png", $nbtome);

						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=accueil";
						header("Location:" . $urlBase . $addArgs);
					}
				}

			break;

			case 'Proposer le tome' :
				if (valider("connecte","SESSION")) {
					if ($titre = valider('titre') && $numtome = valider('numtome') && $idserie = valider('idserie')) // Onvérifie que toutes ces valeurs sont définies
					{
						$idserie = valider('idserie');
						$numtome = valider('numtome'); //On mets dans les variables les valeurs reçu dans le formulaire
						$titre = valider('titre');
						$desc = '';
						$desc = valider('desc');
						$nbtome = -1;
						mkTome($idserie, $numtome, $titre, $desc, $photo="bookpics/default.png", $nbtome);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}

			break;

			case 'Emprunter' :
				if (valider("connecte","SESSION")) {
					$nbEmpruntUser = getUserNbEmprunts($_SESSION['idUser']);
					if ( $livre = valider('livre') && $nbEmpruntUser<5) // Onvérifie que toutes ces valeurs sont définies
					{
						$livre = valider('livre');
						mkEmprunt($livre);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;	
			
			case 'empruntlisteperso' :
				if (valider("connecte","SESSION")) {
					$nbEmpruntUser = getUserNbEmprunts($_SESSION['idUser']);
					if ( $livre = valider('livre') && $nbEmpruntUser<5) // Onvérifie que toutes ces valeurs sont définies
					{
						$livre = valider('livre');
						mkEmprunt($livre);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=listeperso";
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
		
			
			case 'Rendre' :
				if (valider("connecte","SESSION")) {
					if ( $livre = valider('livre')) // Onvérifie que toutes ces valeurs sont définies
					{
						$livre = valider('livre');
						verifEmprunt($_SESSION["idUser"], $livre);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'rendrelisteperso' :
				if (valider("connecte","SESSION")) {
					if ( $livre = valider('livre')) // Onvérifie que toutes ces valeurs sont définies
					{
						$livre = valider('livre');
						verifEmprunt($_SESSION["idUser"], $livre);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=listeperso";
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'adminRendre' :
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					if ( $tome = valider('tome') && $user = valider('user')) // Onvérifie que toutes ces valeurs sont définies
					{
						$tome = valider('tome');
						$user = valider('user');
						disableEmprunt($user, $tome);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$tome;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'adminRendre2' :
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					if ( $tome = valider('tome') && $user = valider('user')) // Onvérifie que toutes ces valeurs sont définies
					{
						$tome = valider('tome');
						$user = valider('user');
						disableEmprunt($user, $tome);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gereremprunt";
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'Éditer le livre' :
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					if ( $id_livre = valider('id_livre') && $titreSerie = valider('titreSerie') && $auteurSerie = valider('auteurSerie') && $titreTome = valider('titreTome') && $nbTome = valider('nbTome')) // Onvérifie que toutes ces valeurs sont définies
					{
						$id_livre = valider('id_livre');
						$id_serie = valider('id_serie');
						$titreSerie = valider('titreSerie'); //On mets dans les variables les valeurs reçu dans le formulaire
						$auteurSerie = valider('auteurSerie');
						$titreTome = valider('titreTome');
						$nbTome = valider('nbTome');
						echo $nbTome;
						$description = valider('description'); 
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
									$photo = iconv('UTF-8', 'ASCII//TRANSLIT', 'bookpics/' . $id_serie.'_'.$nbTome.'.'.$infosfichier['extension']);
									$photo = strtr($photo, " ", "_");
									echo $photo;
									move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
									echo "L'envoi a bien été effectué !";
									editTomePhoto($id_livre, $photo);
								}
							}
						}
						editTomeSerie($id_livre, $titreSerie, $auteurSerie, $titreTome, $nbTome, $description);
						
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$id_livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;					
			
			case 'Sauvegarder' :
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					if ( $id_livre = valider('id_livre')) // On vérifie que toutes ces valeurs sont définies
					{
						$id_livre = valider('id_livre');
						$nbTome = valider('nbTome');
						editStock($id_livre, $nbTome);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$id_livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;	
			
			case 'SupprimerSerie' :
				echo valider('id_serie');
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					if ($passe = valider("passe") && $id_serie = valider('id_serie'))
					{
						$id_serie = valider('id_serie');
						$passe = valider('passe');
						if (verifUser($_SESSION["pseudo"],$passe)) {
							rmSerie($id_serie);
							$redir=1;
							$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio";
							header("Location:" . $urlBase . $addArgs);
						}
					}
				}
			break;
			
			case 'SupprimerLivre' :
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					if ($passe = valider("passe") && $id_livre = valider('id_livre'))
					{
						$id_livre = valider('id_livre');
						$passe = valider('passe');
						if (verifUser($_SESSION["pseudo"],$passe)) {
							rmTome($id_livre);
						}
					}
				}
			break;	
			
			case 'Envoyer votre avis' :
				if (valider("connecte","SESSION")) {
					if ($rating = valider('rating') && $livre = valider('livre')) // Onvérifie que toutes ces valeurs sont définies
					{
						$rating = valider('rating'); //On mets dans les variables les valeurs reçu dans le formulaire
						$com = valider('com');
						$livre = valider('livre');
						mkComment($livre, $com, $rating);
						$redir = 1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;

			case 'rmComment' :
				if (valider("connecte","SESSION")) {
					if ($tome = valider('tome'))						// Onvérifie que toutes ces valeurs sont définies
					{
						$tome = valider('tome'); //On mets dans les variables les valeurs reçu dans le formulaire
						rmComment($_SESSION["idUser"], $tome);
						$redir = 1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$tome;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'rmCommentAdmin' :
				if (valider("connecte","SESSION")  && valider("admin","SESSION")==1) {
					if ($tome = valider('tome') && $user = valider('user'))						// Onvérifie que toutes ces valeurs sont définies
					{
						$tome = valider('tome'); //On mets dans les variables les valeurs reçu dans le formulaire
						$user = valider('user');
						rmComment($user, $tome);
						$redir = 1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$tome;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;

			case 'ajouterListePerso' :
				if (valider("connecte","SESSION")) {
					if ($selectListe = valider("selectListe") && $id_livre = valider('id_livre'))
					{
						$id_livre = valider('id_livre');
						$selectListe = valider('selectListe');
						//echo $id_livre.' '.$selectListe;
						addList($id_livre, $selectListe);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$id_livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;

			case 'ajouterListePersoToRead' :
				if (valider("connecte","SESSION")) {
					$nbEmpruntUser = getUserNbEmprunts($_SESSION['idUser']);
					if ( $id_livre = valider('id_livre') && $nbEmpruntUser<5) // Onvérifie que toutes ces valeurs sont définies
					{
						$id_livre = valider('id_livre');
						mkEmprunt($id_livre);
						if(inList($_SESSION['idUser'], $id_livre)) changeList($id_livre, 2);
						else addList($id_livre, 2);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$id_livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'ajouterListePersoRead' :
				if (valider("connecte","SESSION")) {
					if ( $id_livre = valider('id_livre')) // Onvérifie que toutes ces valeurs sont définies
					{
						$id_livre = valider('id_livre');
						verifEmprunt($_SESSION["idUser"], $id_livre);
						if(inList($_SESSION['idUser'], $id_livre)) changeList($id_livre, 1);
						else addList($id_livre, 1);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$id_livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;

			case 'retirerListePerso' :
				if (valider("connecte","SESSION")) {
					if ($id_livre = valider('id_livre'))
					{
						$id_livre = valider('id_livre');
						rmvList($id_livre);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=serie&tome=".$id_livre;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'retirerListePersolp' :
				if (valider("connecte","SESSION")) {
					if ($id_livre = valider('id_livre'))
					{
						$id_livre = valider('id_livre');
						rmvList($id_livre);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=listeperso";
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'Ajouter le tag' :
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					if ($idserie = valider('idserie') && $addTag = valider('addTag'))
					{
						$idserie = valider('idserie');
						$addTag = valider('addTag');
						addTagsToSerie($idserie, $addTag);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gerertags&serie=".$idserie;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'rmTag' :
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					if ($idserie = valider('serie') && $tag = valider('tag'))
					{
						$idserie = valider('serie');
						$tag = valider('tag');
						rmvTagsToSerie($idserie, $tag);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gerertags&serie=".$idserie;
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'validSerie' :
				if (valider("connecte","SESSION")  && valider("admin","SESSION")==1) {
					if ($idserie = valider('serie'))
					{
						$idserie = valider('serie');
						validSerie($idserie);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio";
						header("Location:" . $urlBase . $addArgs);
					}
				}
			break;
			
			case 'Modifier le profil' :
				if (valider("connecte","SESSION") && valider("admin","SESSION")==1) {
					{
						$id_user = valider('iduser');
						$naissance = valider('naissance');
						$mail = valider('mail'); //On mets dans les variables les valeurs reçu dans le formulaire
						$tel = valider('tel');
						$adresse = valider('adresse');			
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
									$photo = iconv('UTF-8', 'ASCII//TRANSLIT', 'profilpics/' . $id_user.'.'.$infosfichier['extension']);
									$photo = strtr($photo, " ", "_");
									editUserPhoto($id_user, $photo);
									echo $photo;
									move_uploaded_file($_FILES['photo']['tmp_name'], $photo);
									echo "L'envoi a bien été effectué !";
								}
							}
						}						
						editUser($id_user, $naissance, $mail, $tel, $adresse);
						$redir=1;
						$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php?view=profil";
						header("Location:" . $urlBase . $addArgs);
					}
				}

			break;
			
			case 'Logout' :
				session_destroy();
			break;




		}

	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat
	

	
	if ($redir!=1) {
	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	//On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . $addArgs);

	// On écrit seulement après cette entête
	ob_end_flush();
	}
?>










