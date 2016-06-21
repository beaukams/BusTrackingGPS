<?php
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Credentials,Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods: REQUEST, GET, POST');

//$_POST['ligne']="10";
	if(isset($_POST['ligne'])){
		
		
		if(file_exists("base_conf.php")){
			include_once("base_conf.php");
			include_once("requetes.php");
			include_once("mod_traitement.php");


			/*$base = "-1";
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
				$req = "SELECT bus.id_bus,matricule_bus,nom_ligne,latitude,longitude,altitude,vitesse,ladate,heure,sens_bus FROM bus,positionBus WHERE nom_ligne=:ligne AND positionBus.id_positionBus=bus.position_courant";
				$req = $base->prepare($req);
				$req->execute(array(
					":ligne" => $_POST['ligne']
				));*/

				$base = new BaseDD(HOSTNAME,BASENAME,USERNAME,PASSWORD);

				//selectionner le bus le plus proche du premier termier terminus
				$bus = $base->selectBusByLigneName($_POST['ligne']);

				//$bus = $req->fetchall(PDO::FETCH_NUM);
				$i=0;
				$id_bus = $bus[$i][0];
				$matricule = $bus[$i][1];
				$nom_ligne = $bus[$i][2];
				$latitude = $bus[$i][3];
				$longitude = $bus[$i][4];
				$altitude = $bus[$i][5];
				$vitesse = $bus[$i][6];
				$ladate = $bus[$i][7];
				$heure = $bus[$i][8];
				$sens_bus = $bus[$i][9];

				//determiner l'arret le plus proche
				$delta_lat = GPS::getAreaLat(MAX_DISTANCE);
				$delta_lng = GPS::getAreaLong(MAX_DISTANCE);
				$lat_ref = doubleval($latitude);
				$lng_ref = doubleval($longitude);


//				$req = "SELECT * FROM arret";

			
				$arrets_allee = $base->selectAllArretZones($delta_lat, $delta_lng, 1, $lat_ref, $lng_ref, "A");
				$arrets_retour = $base->selectAllArretZones($delta_lat, $delta_lng, 1, $lat_ref, $lng_ref, "R");

				//determine l'arret le plus proche
				$ds_inc = 10;
				$near_stop_id = -1;

				for($j=0; $j<=MAX_DISTANCE; $j = $j + $ds_inc){
					for($i=0; $i<count($arrets_allee); $i++){
						
						if(GPS::distance($lat_ref, $lng_ref, doubleval($arrets_allee[$i][2]), doubleval($arrets_allee[$i][3])) - $j <= 10){
							$near_stop_id = $i;

							break;
						}
					}
					
					if($near_stop_id != -1) break;

				}
				
				$distance_restante = 0;
				$nb = 0;
				if($near_stop_id != -1){
					
					$near_arret = $arrets_allee[$near_stop_id];

						
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



				//$resultats = "{'bus':{'id_bus':'$id_bus','matricule':'$matricule','ligne':'$nom_ligne'},'position':[$latitude,$longitude]}";
				

				echo json_encode($resultats);

				//echo "</div>";
			}
		
	}
?>