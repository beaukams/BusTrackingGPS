<?php
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Content-Type, Authorization, X-Requested-With,Access-Control-Allow-Credentials,Access-Control-Allow-Origin');
		header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Allow-Methods:REQUEST, GET, POST');

	if(isset($_POST['ligne'])){
		echo $_POST['ligne'];
		
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
			//	echo "<div>";
			//	print_r($bus);
				$resultats = "";
				for($i=0; $i<count($bus); $i++){
					if($i!=0)
						$resultats .= "*";
					$resultats .= $bus[$i][0] . "_" . $bus[$i][1] . "_" . $bus[$i][2] . "_" . $bus[$i][3] . "_" . $bus[$i][4] . "_" . $bus[$i][5] . "_" . $bus[$i][6] . "_" . $bus[$i][7] . "_" . $bus[$i][8];
				}

				
				
				
				echo $resultats;

				//echo "</div>";
			}
		}
	}
?>