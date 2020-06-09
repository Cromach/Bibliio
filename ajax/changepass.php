<?php

	include_once "../libs/maLibUtils.php";
	include_once "../libs/maLibSQL.pdo.php";
	include_once "../libs/maLibSecurisation.php"; 
	include_once "../libs/modele.php";

	$iduser = valider('iduser');
	$password = valider('password');
	
	echo changePass($iduser, $password);
	
?>