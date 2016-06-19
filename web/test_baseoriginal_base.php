<?php

		include_once("base_conf.php");
		include_once("requetes.php");
		include_once("mod_traitement.php");

		$base = new BaseDD(HOSTNAME,BASENAME,USERNAME,PASSWORD);

		$arrets = $base->selectAllArretBusAnc();
		print_r($arrets);

		for($i=0; $i<count($arrets); $i++){

			$nom_arret = $arrets[$i][1];
			$lat = doubleval(substr($arrets[$i][2], 0, strlen($arrets[$i][2])))/10000;
			$lng = doubleval(substr($arrets[$i][3], 0, strlen($arrets[$i][3])))/10000;

			//modifier la base de données
			//$base->modifyArretByName($nom_arret, $lat, $lng);
		}
?>