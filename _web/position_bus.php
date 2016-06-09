<?php
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Credentials,Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods: REQUEST, GET, POST');
//$_POST['ligne']="10";
	if(isset($_POST['ligne'])){
		
		
		if(file_exists("../config/base_conf.php")){
			include_once("../config/base_conf.php");

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
				$req = "SELECT bus.id_bus,matricule_bus,nom_ligne,latitude,longitude,altitude,vitesse,ladate,heure FROM bus,positionBus WHERE nom_ligne=:ligne AND positionBus.id_positionBus=bus.position_courant";
				$req = $base->prepare($req);
				$req->execute(array(
					":ligne" => $_POST['ligne']
					));
				$bus = $req->fetchall();
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

				$resultats = array(
						"bus" => array(
							"id_bus" => $id_bus,
							"matricule" => $matricule,
							"ligne" => $nom_ligne),
						"position" => array(
							'lat' => $latitude,
							'lng' => $longitude)
					);



				//$resultats = "{'bus':{'id_bus':'$id_bus','matricule':'$matricule','ligne':'$nom_ligne'},'position':[$latitude,$longitude]}";
				

				echo json_encode($resultats);

				//echo "</div>";
			}
		}
	}
?>