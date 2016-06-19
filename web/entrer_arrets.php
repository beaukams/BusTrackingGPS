<?php
	include_once("base_conf.php");

			$base = "-1";
			$req1 = "mysql:host=" . HOSTNAME . ";dbname=" . BASENAME . "";
			$req2 = "SET NAMES UTF8";

			try{
				$base = new PDO($req1, USERNAME, PASSWORD);
				$req = $base->prepare($req2);
				$req->execute();

			}catch(Exception $e){
			}

			if($base != "-1"){
				//rechercher tous les bus de la ligne
				$req = "SELECT * FROM arretBus";
				$req = $base->prepare($req);
				$req->execute(array(
					));
				$bus = $req->fetchall(PDO::FETCH_NUM);

				

				for($i=0; $i<count($bus); $i++){
					$name = $bus[$i][1];
					$lat = $bus[$i][2]; $lat = substr($lat, 0, strlen($lat)-1); $lat = doubleval($lat)/10000;
					$lng = $bus[$i][3]; $lng = substr($lng, 0, strlen($lng)-1); $lng = -doubleval($lng)/10000;

					echo "$name $lat $lng\n";
					$req = "INSERT INTO arret(nom_arret,latitude_arret,longitude_arret) VALUES(:nom,:lat,:lng)";
					$req = $base->prepare($req);
					$req->execute(array(
						":nom" => $name,
						":lat" => $lat,
						":lng" => $lng
					));

				}
		}

		
?>