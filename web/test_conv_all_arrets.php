<?php

		include_once("base_conf.php");
		include_once("requetes.php");
		include_once("mod_traitement.php");

		$base = new BaseDD(HOSTNAME,BASENAME,USERNAME,PASSWORD);

		$arrets = $base->selectAllArret();
		//print_r($arrets);

		for($i=0; $i<count($arrets); $i++){

			$id_arret = $arrets[$i][0];
			$lat = doubleval($arrets[$i][2]);
			$lng = doubleval($arrets[$i][3]);

			$deg_lat = intval($lat);
			$min_lat_d = ($lat-$deg_lat)*100;
			$min_lat = intval($min_lat_d);
			$sec_lat = ($min_lat_d-$min_lat)*100;

			$deg_lng = intval($lng);
			$min_lng_d = ($lng-$deg_lng)*100;
			$min_lng = intval($min_lng_d);
			$sec_lng = ($min_lng_d-$min_lng)*100;


			if($i==count($arrets)-1){
				
				echo GPS::convertirLat($deg_lat, $min_lat, $sec_lat, "N") . "\n";
				echo GPS::convertirLong($deg_lng, $min_lng, $sec_lng, "W") . "\n";
			}

			//modifier la base de données
			//$base->modifyArret($id_arret, GPS::convertirLat($deg_lat, $min_lat, $sec_lat, "N"), GPS::convertirLong($deg_lng, $min_lng, $sec_lng, "W"));
		}
?>