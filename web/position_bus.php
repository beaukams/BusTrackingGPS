<?php
	if(file_exists("../config/base_conf.php")){
		include_once("../config/base_conf.php");

		$base = -1;
		$req1 = "mysql:host=" . HOSTNAME . ";dbname=" . BASENAME . "";
		$req2 = "SET NAMES UTF8";

		try{
			$base = new PDO($req1, USERNAME, PASSWORD);
			$req = $base->prepare($req2);
			$req->execute();

		}catch(Exception $e){
			$base = -1;
		}

		if($base != -1){
			//rechercher tous les bus de la ligne
			$req = "SELECT bus.id_bus,matricule_bus,nom_ligne,latitude,longitude,altitude,vitesse,ladate,heure FROM bus,positionBus WHERE nom_ligne=10 AND positionBus.id_positionBus=bus.position_courant";
			$req = $base->prepare($req);
			$req->execute();
			$bus = $req->fetchall();
			echo "<div>";
			echo "<ol id=a_" . $i . ">";
			for($i=0; $i<count($bus); $i++){
				
				echo "<li id=id_" . $i . ">" . $bus[$i][0] . "</li>";
				echo "<li id=mat_" . $i . ">" . $bus[$i][1] . "</li>";
				echo "<li id=ligne_" . $i . ">" . $bus[$i][2] . "</li>";
				echo "<li id=lat_" . $i . ">" . $bus[$i][3] . "</li>";
				echo "<li id=lng_" . $i . ">" . $bus[$i][4] . "</li>";
				echo "<li id=alt_" . $i . ">" . $bus[$i][5] . "</li>";
				echo "<li id=v_" . $i . ">" . $bus[$i][6] . "</li>";
				echo "<li id=dat__" . $i . ">" . $bus[$i][7] . "</li>";
				echo "<li id=heure_" . $i . ">" . $bus[$i][8] . "</li>";
			}
			echo "</ol>";
			echo "</div>";
		}
	}
?>