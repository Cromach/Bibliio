<?php
include_once("maLibSQL.pdo.php"); 
// définit les fonctions SQLSelect, SQLUpdate...


// Utilisateurs ///////////////////////////////////////////////////

function verifUserBdd($login, $password){
	$SQL = "SELECT id_user FROM utilisateur WHERE login='$login' AND password='$password'";
	return SQLGetChamp($SQL);
}

function isAdmin($idUser)
{
	// vérifie si l'utilisateur est un administrateur
	$SQL ="SELECT admin FROM utilisateur WHERE id_user='$idUser'";

	return SQLGetChamp($SQL); 
}

function checkUser($login)
{
	$SQL = "SELECT COUNT(*) FROM utilisateur WHERE login='$login'"; 
	$rs = SQLGetChamp($SQL);
	if($rs==0) return false;
	else return true;
}

function mkUser($nom, $prenom, $photo, $naissance, $mail, $tel, $adresse, $admin)
{
	$login = strtolower($nom.$prenom);
	$password=sha1(md5($naissance));
	if(!checkUser($login)) {
		$SQL = "INSERT INTO utilisateur VALUES(0, '$login', '$photo', '$naissance', $admin, '$nom', '$prenom', '$naissance', '$mail', '$tel', '$adresse')";
		echo "Success";
		return SQLInsert($SQL);
	} else echo "Exist";
}

function changePass($id_user, $password)
{
	$password=sha1(md5($password));
	$SQL = "UPDATE utilisateur
			SET password = '$password'
			WHERE id_user=$id_user;"; 
	SQLUpdate($SQL);
	echo "Success";
}

function getUserByID($id)
{
	$SQL = "SELECT * FROM utilisateur WHERE id_user='$id'"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs[0];
}

function getUsers($search='', $nbUser="", $page="")
{
	$like = ($search!= '') ? "(nom LIKE '%$search%' OR prenom LIKE '%$search%')" : "" ;
	$limit = ($nbUser!= '') ? "LIMIT $nbUser" : "" ;
	$offset = ($page!= '') ? "OFFSET ".$page*$nbUser : "" ;
	$where = ($like!= '') ? "WHERE" : "" ;
	$SQL = "SELECT * FROM utilisateur $where $like $limit $offset"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function getUserCount($search='')
{
	$like = ($search!= '') ? "(nom LIKE '%$search%' OR prenom LIKE '%$search%')" : "" ;
	$where = ($like!= '') ? "WHERE" : "" ;
	$SQL = "SELECT COUNT(*) FROM utilisateur $where $like"; 
	$rs = SQLGetChamp($SQL);
	return $rs;
}


function editUser($id_user, $naissance, $mail, $tel, $adresse)
{
	$SQL = "UPDATE utilisateur
			SET date_naissance = '$naissance',
				mail = '$mail',
				telephone = '$tel',
				adresse = '$adresse'
			WHERE id_user = $id_user;";
	//echo $SQL;
	return SQLInsert($SQL);
}

function editUserPhoto($id_user, $photo)
{

	$SQL = "UPDATE utilisateur
			SET profilpic = '$photo'
			WHERE id_user=$id_user;"; 
	SQLUpdate($SQL);
}

// Serie ////////////////////////////////////////////////

function checkSerie($titre)
{
	$SQL = "SELECT COUNT(*) FROM serie WHERE titre='$titre'"; 
	$rs = SQLGetChamp($SQL);
	if($rs==0) return false;
	else return true;
}

function mkSerie($titre, $auteur, $id_type, $actif=1)
{
	if(!checkSerie($titre))
	{
		$SQL = "INSERT INTO serie VALUES(0, '$titre', '$auteur', $id_type, $actif)";
		//echo $SQL;
		echo "Success";
		return SQLInsert($SQL);
	} else echo "Exist";
}

function rmSerie($id)
{
	$SQL = "DELETE FROM serie WHERE id_serie='$id'";
	return SQLInsert($SQL);
}


function getSeriesCount($filtres='', $search='', $hideDebug=false, $tags="")
{
	$and = ($filtres!= '' || $search!= '' || $hideDebug) ? "AND" : "" ;
	$like = ($search!= '') ? "(auteur LIKE '%$search%' OR titre LIKE '%$search%')" : "" ;
	if ($hideDebug) $hideDebug= "id_serie in (SELECT id_serie FROM tome )";
	$filterslist = array();
	if($filtres!='') array_push($filterslist, $filtres);
	if($search!='') array_push($filterslist, $like);
	if($tags!='') array_push($filterslist, $tags);
	if($hideDebug!='') array_push($filterslist, $hideDebug);
	$filters = implode(" AND ", $filterslist);
	$SQL = "SELECT COUNT(*) FROM serie WHERE actif=1 $and $filters "; 
	//print_r($filterslist);
	$rs = SQLGetChamp($SQL);
	return $rs;
}

function getProposCount($filtres='', $search='', $hideDebug=false, $tags="")
{
	$and = ($filtres!= '' || $search!= '' || $hideDebug) ? "AND" : "" ;
	$like = ($search!= '') ? "(auteur LIKE '%$search%' OR titre LIKE '%$search%')" : "" ;
	if ($hideDebug) $hideDebug= "id_serie in (SELECT id_serie FROM tome )";
	$filterslist = array();
	if($filtres!='') array_push($filterslist, $filtres);
	if($search!='') array_push($filterslist, $like);
	if($tags!='') array_push($filterslist, $tags);
	if($hideDebug!='') array_push($filterslist, $hideDebug);
	$filters = implode(" AND ", $filterslist);
	$SQL = "SELECT COUNT(*) FROM serie WHERE actif=0 $and $filters "; 
	//print_r($filterslist);
	$rs = SQLGetChamp($SQL);
	return $rs;
}

function setPagination($nbSeriePage, $page) //Inutilisée, j'ai plutôt utilisé du javascript couplé à de l'ajax pour gérer la pagination et les recherches
{
	$nbSerie = getSeriesCount();
	$nbPage = ceil($nbSerie / $nbSeriePage); 
	$pageinf2=$page-2;
	$pageinf1=$page-1;
	$pagesup1=$page+1;
	$pagesup2=$page+2;
	
	if($page==1) {
	?>
	
	<nav aria-label="Page navigation">
	  <ul class="pagination justify-content-center">
		<li class="page-item disabled">
		  <a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=1"; ?>" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>
		<li class="page-item active"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$page; ?>"><?php echo $page; ?></a></li>
		<li class="page-item"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$pagesup1; ?>"><?php echo $pagesup1; ?></a></li>
		<li class="page-item"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$pagesup2; ?>"><?php echo $pagesup2; ?></a></li>
		<li class="page-item">
		  <a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$nbPage; ?>" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>
	  </ul>
	</nav>
	
	<?php } else if($page==$nbPage) {?>

		<nav aria-label="Page navigation">
	  <ul class="pagination justify-content-center">
		<li class="page-item">
		  <a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=1"; ?>" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>
		<li class="page-item"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$pageinf2; ?>"><?php echo $pageinf2; ?></a></li>
		<li class="page-item"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$pageinf1; ?>"><?php echo $pageinf1; ?></a></li>
		<li class="page-item active"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$page; ?>"><?php echo $page; ?></a></li>
		<li class="page-item disabled">
		  <a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$nbPage; ?>" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		  </a>
		</li>
	  </ul>
	</nav>
	
	<?php } else {?>
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
    <li class="page-item">
      <a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=1"; ?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$pageinf1; ?>"><?php echo $pageinf1; ?></a></li>
    <li class="page-item active"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$page; ?>"><?php echo $page; ?></a></li>
    <li class="page-item"><a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$pagesup1; ?>"><?php echo $pagesup1; ?></a></li>
    <li class="page-item">
      <a class="page-link" href="<?php echo dirname($_SERVER["PHP_SELF"]) . "/index.php?view=gererbiblio&page=".$nbPage; ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
	
	<?php }
}

function getSeries($filtres='', $search='', $nbSerie="", $page="", $hideDebug=false, $tags="")
{
	$limit = ($nbSerie!= '') ? "LIMIT $nbSerie" : "" ;
	$offset = ($page!= '') ? "OFFSET ".$page*$nbSerie : "" ;
	$and = ($filtres!= '' || $search!= '' || $hideDebug) ? "AND" : "" ;
	$like = ($search!= '') ? "(auteur LIKE '%$search%' OR titre LIKE '%$search%')" : "" ;
	if ($hideDebug) $hideDebug= "id_serie in (SELECT id_serie FROM tome )";
	$filterslist = array();
	if($filtres!='') array_push($filterslist, $filtres);
	if($search!='') array_push($filterslist, $like);
	if($tags!='') array_push($filterslist, $tags);
	if($hideDebug!='') array_push($filterslist, $hideDebug);
	$filters = implode(" AND ", $filterslist);
	$SQL = "SELECT * FROM serie WHERE actif=1 $and $filters ORDER BY titre $limit $offset"; 
	$rs = SQLSelect($SQL);
	$tab = parcoursRs($rs);
	////echo $SQL;
	return $tab; 
}

function getPropos($filtres='', $search='', $nbSerie="", $page="", $hideDebug=false, $tags="")
{
	$limit = ($nbSerie!= '') ? "LIMIT $nbSerie" : "" ;
	$offset = ($page!= '') ? "OFFSET ".$page*$nbSerie : "" ;
	$and = ($filtres!= '' || $search!= '' || $hideDebug) ? "AND" : "" ;
	$like = ($search!= '') ? "(auteur LIKE '%$search%' OR titre LIKE '%$search%')" : "" ;
	if ($hideDebug) $hideDebug= "id_serie in (SELECT id_serie FROM tome )";
	$filterslist = array();
	if($filtres!='') array_push($filterslist, $filtres);
	if($search!='') array_push($filterslist, $like);
	if($tags!='') array_push($filterslist, $tags);
	if($hideDebug!='') array_push($filterslist, $hideDebug);
	$filters = implode(" AND ", $filterslist);
	$SQL = "SELECT * FROM serie WHERE actif=0 $and $filters ORDER BY titre $limit $offset"; 
	$rs = SQLSelect($SQL);
	$tab = parcoursRs($rs);
	////echo $SQL;
	return $tab; 
}

function validSerie($id_serie)
{
	$SQL = "UPDATE serie SET actif = 1 WHERE id_serie=$id_serie";
	SQLUpdate($SQL);
	if(getTomesCountPropos($id_serie)>0) $SQL = "UPDATE tome SET nbtome = 0 WHERE id_serie=$id_serie";
	SQLUpdate($SQL);
}


function getSeriesByID($id)
{
	$SQL = "SELECT * FROM serie WHERE id_serie='$id'"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs[0];
}

function getseriebyall($nomSerie, $auteurSerie, $typeSerie, $actif)
{
	$SQL = "SELECT id_serie FROM serie WHERE titre='$nomSerie' AND auteur='$auteurSerie'AND id_type=$typeSerie AND actif=$actif"; 
	$rs = SQLGetChamp($SQL);
	return $rs;
}

function getIDSeriesByName($titre)
{
	$SQL = "SELECT id_serie FROM serie WHERE titre='$titre'"; 
	$rs = SQLGetChamp($SQL);
	//echo $rs;
	return $rs; 
}

function getSerieAvgRate($id_serie)
{
	$tomes = getTomes($id_serie);
	$tomelist = array();
	foreach ($tomes as $tome) {
	array_push($tomelist, 'id_tome='.$tome['id_tome']);
	}
	$where = implode(" OR ", $tomelist);
	//echo $where;
	$SQL = "SELECT AVG(note) FROM commentaire WHERE $where";
	////echo $SQL;
	$rs = SQLGetChamp($SQL);
	return $rs; 
}

function getRate($id_user, $id_tome)
{
	$SQL = "SELECT note FROM commentaire WHERE id_tome=$id_tome AND id_user=$id_user";
	$rs = SQLGetChamp($SQL);
	return $rs; 
}

// Tome ////////////////////////////////////////////////

function mkTome($idserie, $numtome, $titre, $desc, $photo, $nbtome=0, $nbemprunte = 0)
{
	if(!checkTomeNumber($idserie, $numtome)) {
		$SQL = "INSERT INTO tome VALUES(0, $idserie, $numtome, '$titre', '$desc', '$photo', $nbtome, $nbemprunte)";
		echo "Success";
		return SQLInsert($SQL);
	} else echo "Exist";
}

function checkTomeNumber($idserie, $numtome)
{
	$SQL = "SELECT COUNT(*) FROM tome WHERE id_serie='$idserie' AND numtome=$numtome"; 
	$rs = SQLGetChamp($SQL);
	if($rs==0) return false;
	else return true;
}

function rmTome($id)
{
	$SQL = "DELETE FROM tome WHERE id_tome='$id'";
	return SQLInsert($SQL);
}

function getTomeById($id)
{
	$SQL = "SELECT * FROM tome WHERE id_tome='$id'"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs[0];
}

function getTomes($id_serie)
{
	$SQL = "SELECT * FROM tome WHERE id_serie='$id_serie' AND nbtome>-1 ORDER BY numtome"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function getTomesPropos($id_serie)
{
	$SQL = "SELECT * FROM tome WHERE id_serie='$id_serie' AND nbtome=-1 ORDER BY numtome"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function getAccueilTomes($limit)
{
	$SQL = "SELECT * FROM tome WHERE nbtome>-1 ORDER BY id_tome DESC LIMIT $limit"; 
	$rs = SQLSelect($SQL);
	$tab = parcoursRs($rs); 
	return $tab; 
}

function getTomesCount($id_serie)
{
	$SQL = "SELECT COUNT(id_tome) FROM tome WHERE id_serie='$id_serie' AND nbtome>-1"; 
	$rs = SQLGetChamp($SQL);
	return $rs;
}

function getTomesCountPropos($id_serie)
{
	$SQL = "SELECT COUNT(id_tome) FROM tome WHERE id_serie='$id_serie' AND nbtome=-1"; 
	$rs = SQLGetChamp($SQL);
	return $rs;
}

function getTomeAvgRate($id_livre)
{
	$SQL = "SELECT AVG(note) FROM commentaire WHERE id_tome='$id_livre'";
	$rs = SQLGetChamp($SQL);
	return $rs; 
}

function checkDispo($id_tome, $id_user)
{
	$livre = getTomeById($id_tome);
	$nbEmpruntUser = getUserNbEmprunts($id_user);
	if($livre['nbtome']-$livre['nbemprunte']==0) return 'value="Non disponible" disabled';
	if($nbEmpruntUser==5) return 'value="Limite d\'emprunt atteinte" disabled';
	return 'value="Emprunter"';
}

function editStock($id_tome, $nbTome)
{
	$livre = getTomeById($id_tome);
	$serie = getSeriesByID($livre['id_serie']);
	$id_serie = $serie['id_serie'];
	$SQL = "UPDATE tome
			SET nbtome = $nbTome
			WHERE id_tome=$id_tome;"; 
	//echo $SQL;
	SQLUpdate($SQL);

}

function editTomePhoto($id_tome, $photo)
{

	$SQL = "UPDATE tome
			SET photo = '$photo'
			WHERE id_tome=$id_tome;"; 
	SQLUpdate($SQL);
}

// Type ////////////////////////////////////////////////

function getTypes()
{
	$SQL = "SELECT * FROM type"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function getTypeById($id_type)
{
	$SQL = "SELECT * FROM type where id_type=$id_type"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs[0];
}

// Commentaires ////////////////////////////////////////////////

function mkComment($livre, $com, $note='null')
{
	$SQL = "INSERT INTO commentaire VALUES(0, ".$_SESSION['idUser'].", $livre, $note, '$com')";
	//echo $SQL;
	return SQLInsert($SQL);
}

function rmComment($id_user, $id_livre)
{
	$SQL = "DELETE FROM commentaire WHERE id_tome='$id_livre' AND id_user='$id_user'";
	return SQLInsert($SQL);
}

function getCommentaires($id_livre)
{
	$SQL = "SELECT * FROM commentaire WHERE id_tome='$id_livre'"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function checkComment($id_user, $id_livre)
{
	$SQL = "SELECT COUNT(id_com) FROM commentaire WHERE id_tome=$id_livre AND id_user=$id_user"; 
	$rs = SQLGetChamp($SQL);
	if($rs==0) return false;
	else return true;
}

function getCommentairesByUser($id_user, $id_livre)
{
	$SQL = "SELECT * FROM commentaire WHERE id_tome='$id_livre' AND id_user='$id_user'"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs[0];
}

function getAllCommentairesByUser($id_user)
{
	$SQL = "SELECT t1.com, t1.note, t2.titre FROM commentaire t1, tome t2 WHERE t1.id_user=$id_user AND t1.id_tome=t2.id_tome"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function getCommentCountWithourUser($id_livre, $id_user)
{
	$SQL = "SELECT COUNT(id_com) FROM commentaire WHERE id_tome=$id_livre AND id_user!=$id_user"; 
	$rs = SQLGetChamp($SQL);
	return $rs;
}

function getCommentCount($id_livre)
{
	$SQL = "SELECT COUNT(id_com) FROM commentaire WHERE id_tome=$id_livre"; 
	$rs = SQLGetChamp($SQL);
	return $rs;
}

// Emprunts ////////////////////////////////////////////////

function mkEmprunt($livre)
{
	$SQL = "UPDATE tome SET nbemprunte = nbemprunte+1 WHERE id_tome=$livre";
	SQLUpdate($SQL);
	$SQL = "INSERT INTO emprunt VALUES(0, ".$_SESSION['idUser'].", $livre, 1, NOW())";
	////echo $SQL;
	return SQLInsert($SQL);
}

function verifEmprunt($user, $livre)
{
	$SQL = "UPDATE emprunt SET actif = 2 WHERE id_tome=$livre AND id_user=$user AND actif=1";
	SQLUpdate($SQL);
}

function disableEmprunt($user, $livre)
{
	$SQL = "UPDATE tome SET nbemprunte = nbemprunte-1 WHERE id_tome=$livre";
	SQLUpdate($SQL);
	$SQL = "UPDATE emprunt SET actif = 0 WHERE id_tome=$livre AND id_user=$user AND actif>0";
	SQLUpdate($SQL);
}

function checkEmprunt($id_user, $id_livre)
{
	$SQL = "SELECT actif FROM emprunt WHERE id_tome=$id_livre AND id_user=$id_user AND actif>0"; 
	$rs = SQLGetChamp($SQL);
	return $rs;

}

function getEmpruntsCount( $filtres='', $search='' )
{
	$and = ($filtres!= '' || $search!= '') ? "AND" : "" ;
	$like = ($search!= '') ? "(login LIKE '%$search%' OR titre LIKE '%$search%' OR nom LIKE '%$search%' OR prenom LIKE '%$search%')" : "" ;
	$filterslist = array();
	if($filtres!='') array_push($filterslist, $filtres);
	if($search!='') array_push($filterslist, $like);
	$filters = implode(" AND ", $filterslist);
	$SQL = "SELECT COUNT(t1.id_emprunt), t1.id_user, t2.login, t2.nom, t2.prenom, t1.id_tome, t3.titre, t1.actif, t1.date , DATE_ADD(t1.date, INTERVAL 7 DAY) AS date_limite 
			FROM emprunt t1, utilisateur t2, tome t3 
			WHERE t1.id_user=t2.id_user AND t1.id_tome=t3.id_tome $and $filters
			ORDER BY date DESC";
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs[0]['COUNT(t1.id_emprunt)']; //On ne récupère que le nombre de résultat (Sinon affichait une erreur : "t1.actif inconnu" etc)
}

function getAllEmprunts( $filtres='', $search='', $nbEmprunts='', $page='')
{
	$limit = ($nbEmprunts!= '') ? "LIMIT $nbEmprunts" : "" ;
	$offset = ($page!= '') ? "OFFSET ".$page*$nbEmprunts : "" ;
	$and = ($filtres!= '' || $search!= '') ? "AND" : "" ;
	$like = ($search!= '') ? "(login LIKE '%$search%' OR titre LIKE '%$search%' OR nom LIKE '%$search%' OR prenom LIKE '%$search%')" : "" ;
	$filterslist = array();
	if($filtres!='') array_push($filterslist, $filtres);
	if($search!='') array_push($filterslist, $like);
	$filters = implode(" AND ", $filterslist);
	$SQL = "SELECT t1.id_emprunt, t1.id_user, t2.login, t2.nom, t2.prenom, t1.id_tome, t3.titre, t1.actif, t1.date , DATE_ADD(t1.date, INTERVAL 7 DAY) AS date_limite 
			FROM emprunt t1, utilisateur t2, tome t3 
			WHERE t1.id_user=t2.id_user AND t1.id_tome=t3.id_tome $and $filters
			ORDER BY actif DESC, date DESC $limit $offset";
	////echo $SQL;
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function getEmprunts($id_livre)
{
	$SQL = "SELECT *, DATE_ADD(date, INTERVAL 7 DAY) AS date_limite FROM emprunt WHERE id_tome=$id_livre AND actif>0"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function getUserNbEmprunts($id_user)
{
	$SQL = "SELECT COUNT(id_emprunt) FROM emprunt WHERE actif>0 and id_user=$id_user"; 
	$rs = SQLGetChamp($SQL);
	return $rs;
}

function getUserEmprunts($id_user)
{
	$SQL = "SELECT id_tome, date, DATE_ADD(date, INTERVAL 7 DAY) AS date_limite FROM emprunt WHERE actif>0 and id_user=$id_user ORDER BY date ASC"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

// Liste perso ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function addList($livre, $liste)
{
	$SQL = "INSERT INTO liste_perso VALUES(".$_SESSION['idUser'].", $liste, $livre)";
	////echo $SQL;
	return SQLInsert($SQL);
}

function rmvList($livre)
{
	$SQL = "DELETE FROM liste_perso WHERE id_tome='$livre' AND id_user=".$_SESSION['idUser'];
	//echo $SQL;
	return SQLInsert($SQL);
}

function changeList($livre, $liste)
{

	$SQL = "UPDATE liste_perso
			SET liste = '$liste'
			WHERE id_tome=$livre;"; 
	//echo $SQL;
	SQLUpdate($SQL);
}

function inList($id_user, $id_livre)
{
	$SQL = "SELECT COUNT(*) FROM liste_perso WHERE id_user=$id_user and id_tome=$id_livre";
	$rs = SQLGetChamp($SQL);
	if($rs==1) return true;
	else return false;
}

function inList12($id_user, $id_livre)
{
	$SQL = "SELECT COUNT(*) FROM liste_perso WHERE id_user=$id_user and id_tome=$id_livre and liste!=3";
	$rs = SQLGetChamp($SQL);
	if($rs==1) return true;
	else return false;
}

function inList1($id_user, $id_livre)
{
	$SQL = "SELECT COUNT(*) FROM liste_perso WHERE id_user=$id_user and id_tome=$id_livre and liste=1";
	$rs = SQLGetChamp($SQL);
	if($rs==1) return true;
	else return false;
}

function getTomeInListCount($id_user, $filtre='' )
{
	$SQL = "SELECT COUNT(t1.id_tome), t1.id_user, t1.liste, t2.titre, t2.numtome, t2.photo, t3.note 
			FROM liste_perso t1, tome t2, commentaire t3 
			WHERE t1.id_tome=t2.id_tome AND t3.id_user=t1.id_user AND t1.id_tome=t3.id_tome AND t1.id_user=$id_user $filtre ORDER BY t1.liste, t2.titre ASC";
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs[0]['COUNT(t1.id_tome)']; //On ne récupère que le nombre de résultat
}

function getTomeInList($id_user, $filtre="")
{
	$SQL = "SELECT t1.id_user, t1.liste, t1.id_tome, t2.titre, t2.numtome, t2.photo 
			FROM liste_perso t1, tome t2
			WHERE t1.id_tome=t2.id_tome AND t1.id_user=$id_user $filtre ORDER BY t1.liste, t2.titre ASC";
	////echo $SQL;
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

// Tags /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function getTags()
{
	$SQL = "SELECT * FROM tag_list"; 
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function getTagsBySerie($id_serie)
{
	$SQL = "SELECT t1.id_tag, t1.id_serie, t2.description FROM tag_serie t1, tag_list t2 WHERE t1.id_tag=t2.id_tag AND t1.id_serie=$id_serie"; 
	////echo $SQL;
	$rs = parcoursRs(SQLSelect($SQL));
	return $rs;
}

function hasTag($id_serie, $id_tag)
{
	$SQL = "SELECT COUNT(*) FROM tag_serie WHERE id_serie=$id_serie AND id_tag=$id_tag"; 
	$rs = SQLGetChamp($SQL);
	if($rs==0) return false;
	else return true;
}

function addTagsToSerie($id_serie, $id_tag)
{
	if(!hasTag($id_serie, $id_tag))
	{
		$SQL = "INSERT INTO tag_serie VALUES('$id_tag', $id_serie)";
		//echo $SQL;
		return SQLInsert($SQL);
	}
}

function rmvTagsToSerie($id_serie, $id_tag)
{
	$SQL = "DELETE FROM tag_serie WHERE id_serie=$id_serie AND id_tag=$id_tag";
	//echo $SQL;
	return SQLInsert($SQL);
}

function countTagsSerie($id_serie)
{
	$SQL = "SELECT count(*) FROM tag_serie WHERE id_serie=$id_serie";
	////echo $SQL;
	$rs = SQLGetChamp($SQL);
	return $rs;
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function editTomeSerie($id_tome, $titreSerie, $auteurSerie, $titreTome, $nbTome, $description)
{
	$livre = getTomeById($id_tome);
	$serie = getSeriesByID($livre['id_serie']);
	$id_serie = $serie['id_serie'];
	$SQL = "UPDATE serie
			SET titre = '$titreSerie',
				auteur = '$auteurSerie'
			WHERE id_serie = $id_serie;
			UPDATE tome
			SET titre = '$titreTome',
				numtome = $nbTome,
				description = '$description'
			WHERE id_tome=$id_tome;";
	//echo $SQL;			
	SQLUpdate($SQL);
}

?>