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
			$req = "SELECT * FROM bus WHERE nom_ligne=10";
			$req = $base->prepare($req);
			$req->execute();
			$bus = $req->fetchall();
			echo "<div>";
			for($i=0; $i<count($bus); $i++){
				echo "<div>" . $bus[$i][1] . "</div>";
				//echo "lol";
			}
			echo "</div>";
		}
	}
?>