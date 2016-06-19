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
	}

	/***************testes***********************/
	//echo GPS::distance(15.162717,-17.516171,15.262717,-17.716171);
	//echo GPS::convertirLat(14,68,81.40, "N") . "\n";
	//echo GPS::convertirLong(17,28,00.30, "W") . "\n";
	/*echo GPS::getAreaLat(100)  . "\n";
	echo GPS::distance(15.162717,-17.516171,15.162717+0.0009,-17.516171) . "\n"; */
	//echo GPS::distance(14.68133,-17.466775,15.122314814814,-17.753958333333);

	//14.688140, -17.464442
?>