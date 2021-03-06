<?php

	class GPS{

		/* calculer la distance entre deux points GPS */
		static function distance($lat1, $lng1, $lat2, $lng2){
			$delta = deg2rad($lng1-$lng2);
			$sdlong = sin($delta);
			$cdlong = cos($delta);
			$lat1 = deg2rad($lat1); 
			$lat2 = deg2rad($lat2);
			$slat1 = sin($lat1);
			$clat1 = cos($lat1);
			$slat2 = sin($lat2);
			$clat2 = cos($lat2);
			$delta = ($clat1 * $slat2) - ($slat1 * $clat2 * $cdlong);
			$delta = pow($delta, 2);
			$delta += pow($clat2*$sdlong, 2);
			$delta = sqrt($delta);
			$denom = ($slat1 * $slat2) + ($clat1 * $clat2 * $cdlong);
			$delta = atan2($delta, $denom);
			return $delta * 6372795;
		}

		/* calcul de la direction */
		static function course($lat1, $lng1, $lat2, $lng2){
			$dlon = deg2rad($lng2-$lng1);
			$lat1 = deg2rad($lat1);
			$lat2 = deg2rad($lat2);
			$a1 = sin($dlon) * cos($lat2);
			$a2 = sin($lat1) * cos($lat2) * cos($dlon);
			$a2 = cos($lat1) * sin($lat2) - $a2;
			$a2 = atan2($a1, $a2);
			if($a2 < 0.0)
				$a2 += 2*M_PI;
		  	return rad2deg(a2);
		}
		
		/* recuperer les deux arrets les plus proches */
		static function get($lat, $lng){

		}

		static function convertirLat($deg_lat,$min_lat,$sec_lat, $orientation){
			$lat = $deg_lat + $min_lat/60.0 + $sec_lat/3600.0;
			if($orientation == "S") $lat = -1 * $lat;

			return $lat;
		}
		
		static function convertirLong($deg_lng,$min_lng,$sec_lng, $orientation){
			$lng = $deg_lng + $min_lng/60.0 + $sec_lng/3600.0;
			if($orientation == "W") $lng = (-1) * $lng;

			return $lng;
		}

		/*
				retourne la latitude et la longitude minimale à ajouter à un point pour avoir la distance donnée
				On prend un point de reference (latitude, longitude). On cherche la latitude a ajouter pour avoir un point de même longitude situé à distance distance_ref.
				Puis on cherche, la longitude à ajouter pour avoir un point de même latitude à une distance distance_ref
		*/
		static function getAreaLong($distance_ref, $precision = 0.000001){
			
			$lat_ref= 14.432479;
			$lng_ref = 17.273171;
			$delta_lng = 0;
			$temp = 0;
			while(1){
				$delta_lng += $precision;
				$temp = GPS::distance($lat_ref, $lng_ref, $lat_ref, $lng_ref+$delta_lng);
				if($temp >= $distance_ref)
					break;
			}
			return $delta_lng;
		}

		static function getAreaLat($distance_ref, $precision = 0.000001){
			$lat_ref= 14.432479;
			$lng_ref = 17.273171;
			$delta_lat = 0;
			$temp = 0;
			while(1){
				$delta_lat += $precision;
				$temp = GPS::distance($lat_ref, $lng_ref, $lat_ref+$delta_lat, $lng_ref);
				if($temp >= $distance_ref)
					break;
			}
			return $delta_lat;
		}
	}

	
	class Controller{


		static function separeMsg($msg, $separateur=" "){
			return explode($separateur, $msg);
		}

		static function formatteMsg($array_infos){

		}

		static function selectNearBusTerminus($base, $ligne, $sens){
				//selectionner le bus le plus proche du premier termier terminus
				$bus = Controller::getNearBus($base, 1, $sens);
				
				if(empty($bus)){

				}else{
					//$bus = $req->fetchall(PDO::FETCH_NUM);
				$i=0;
				$id_bus = $bus[0];
				$matricule = $bus[1];
				$nom_ligne = $bus[2];
				$latitude = $bus[3];
				$longitude = $bus[4];
				$altitude = $bus[5];
				$vitesse = $bus[6];
				$ladate = $bus[7];
				$heure = $bus[8];
				$sens_bus = $bus[9];

				//determiner l'arret le plus proche
				$delta_lat = GPS::getAreaLat(MAX_DISTANCE);
				$delta_lng = GPS::getAreaLong(MAX_DISTANCE);
				$lat_ref = doubleval($latitude);
				$lng_ref = doubleval($longitude);

				$arrets_zone = $base->selectAllArretZones($delta_lat, $delta_lng, 1, $lat_ref, $lng_ref, $sens);

				//determine l'arret le plus proche
				$ds_inc = 10;
				$near_stop_id = -1;

				for($j=0; $j<=MAX_DISTANCE; $j = $j + $ds_inc){
					for($i=0; $i<count($arrets_zone); $i++){
						
						if(GPS::distance($lat_ref, $lng_ref, doubleval($arrets_zone
							[$i][2]), doubleval($arrets_zone[$i][3])) - $j <= 10){
							$near_stop_id = $i;

							break;
						}
					}
					
					if($near_stop_id != -1) break;

				}
				
				$distance_restante = 0;
				$nb = 0;
				if($near_stop_id != -1){
					
					$near_arret = $arrets_zone[$near_stop_id];

						
					//selectionner tous les arrets de la ligne
					$all_arrets = $base->selectArretsLigneRestant(1, $sens_bus, $near_arret[4]);

					//approximer la distante restante pour arriver par rapport 
					//on parcours les arrets. si un arret n'est pas encore traversé, alors ajouter la distance restante
					for($ii = 0; $ii<count($all_arrets); $ii++){
						//if(intval($all_arrets[$ii][4]) <= intval($near_arret[4])){
						//	echo "arret " . $arrets_allee[$ii][1] . "\n";
							$distance_restante += doubleval($all_arrets[$ii][5]); 
							$nb++;
						//}
					}
				}

				if(!isset($near_arret))
					$near_arret = "";
				else{
					$near_arret = array(
						"nom" => $near_arret[1],
						"lat" => $near_arret[2],
						"lng" => $near_arret[3],
						"reste" => $nb-1
					);
				}			

				$resultats = array(
						"bus" => array(
							"id_bus" => $id_bus,
							"matricule" => $matricule,
							"ligne" => $nom_ligne
						),
						"position" => array(
							'lat' => $latitude,
							'lng' => $longitude,
							'reste' => $distance_restante
						),
						"arrets" => $near_arret
					);
					return $resultats;

				}
		}


		/* selectionner le bus le plus proche */
		static function getNearBus($base, $id_ligne, $sens){
			//selectionner le terminus
			$terminus = $base->selectTerminus($id_ligne, $sens)[0];

			//selectionner tous les bus 
			$lat_ref = doubleval($terminus[1]);
			$lng_ref = doubleval($terminus[2]);

			$all_bus = $base->selectAllBusLigneSens("10", $sens);

			$ds_inc = 10;
			$near_bus_id = -1;
			for($j=0; $j<=20000; $j = $j + $ds_inc){
					for($i=0; $i<count($all_bus); $i++){
						
						if(GPS::distance($lat_ref, $lng_ref, doubleval($all_bus[$i][3]), doubleval($all_bus[$i][4])) - $j <= $ds_inc){
							$near_bus_id = $i;

							break;
						}
					}
					
					if($near_bus_id != -1) break;

			}

			if($near_bus_id != -1){
				return $all_bus[$near_bus_id];
			}else{
				return [];
			}

			
		}
	}

	/***************testes***********************/
	//echo GPS::distance(15.162717,-17.516171,15.262717,-17.716171);
	//echo GPS::convertirLat(14,68,81.40, "N") . "\n";
	//echo GPS::convertirLong(17,28,00.30, "W") . "\n";
	/*echo GPS::getAreaLat(100)  . "\n";
	echo GPS::distance(15.162717,-17.516171,15.162717+0.0009,-17.516171) . "\n"; */
	//echo GPS::distance(14.68133,-17.466775,15.122314814814,-17.753958333333);

	//14.688140, -17.464442

	//teste
/*	include_once("base_conf.php");
	include_once("requetes.php");

	$base = new BaseDD(HOSTNAME,BASENAME,USERNAME,PASSWORD);

	//print_r(Controller::getNearBus($base, 1, "A"));
	print_r(Controller::selectNearBusTerminus($base, "10", "R"));*/
?>