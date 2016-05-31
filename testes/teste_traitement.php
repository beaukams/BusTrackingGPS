<?php
	include_once("../server/requetes.php");

	//teste de la fonction connexion de la base de données
	$base = connexion_base();
	insert_recvSms("ligne 13", "773675372", $base);

?>