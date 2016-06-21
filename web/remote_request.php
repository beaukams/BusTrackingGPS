<?php
	/* controller de bus tracking*/

	//$_POST['donnees'] = "10111dk ligne 10 14.681330 -17.466775 16.4000 2.037200 2 11502200 260416";

	if(isset($_POST['donnees']) && $_POST['donnees'] != "" && file_exists("base_conf.php") && file_exists("requetes.php")){
		
		include_once("base_conf.php");
		include_once("requetes.php");

		$sms = explode(" ", $_POST['donnees']);
		


		$base = new BaseDD(HOSTNAME,BASENAME,USERNAME,PASSWORD);

		$id_bus = $base->selectBusByMatricule($sms[0])[0][0];


		

		if($id_bus != -1){
			//ajouter nouvelle position dans la base de données
			$ladate = "20" . $sms[9][4] . $sms[9][5] . "-" . $sms[9][2] . $sms[9][3] . "-" . $sms[9][0] . $sms[9][1];
			$lheure = $sms[8][0] . $sms[8][1] . ":" . $sms[8][2] . $sms[8][3] . ":" . $sms[8][4] . $sms[8][5];
			
			$position = $base->addPositionBus($id_bus, $sms[3], $sms[4], $sms[5], $sms[6], $ladate, $lheure);

			//mettre à jour la position courante du bus
			$base->modifyBus($id_bus, $position);
		}
		
		
	}

	
?>