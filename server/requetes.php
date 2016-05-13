<?php
	
	/*
	* Connexion à la base de données
	*/
	function connexion_base(){
			$base = -1;

			if(file_exists("../config/base_conf.php")){
				include_once("../config/base_conf.php");

				$req1 = "mysql:host=" . HOSTNAME . ";dbname=" . BASENAME . "";
				$req2 = "SET NAMES UTF8";

				try{
					$base = new PDO($req1, USERNAME, PASSWORD);
					$req = $base->prepare($req2);
					$req->execute();

				}catch(Exception $e){

				}
			}

			return $base;
	}


	function insert_recvSms($sms, $dest, $base){
		$req = "INSERT INTO smsRecv(contenu, emetteur, ladate, heure) VALUES(:contenu, :emetteur, :ladate, :heure)";

		$res = -1;

		try{
			$dat = Date("Y-m-d");
			$heur = Date("H:i:s");
			$envoie = $base->prepare($req);
			$envoie->execute(array( 
					":contenu" 		=> $sms,
					":emetteur" 	=> $dest,
					":ladate"		=> $dat,
					":heure"		=> $heur
				));

		}catch(Exception $e){

		}

		return $res;
	} 

	function select_ligne($nom_ligne){
		/*
		selectionner une ligne
		*/
		$req = "SELECT * FROM ligneBus WHERE nom_ligne := nom_ligne";

		$res = -1;

		try{
			$envoie = $base->prepare($req);
			$envoie->execute(array( 
					":nom_ligne" 		=> $nom_ligne
				));
			$res = $envoie->fetchall();

		}catch(Exception $e){

		}

		return $res;

	}

	function select_bus($matricule){
		/*
		Selectionner un bus
		*/
		$req = "SELECT * FROM bus WHERE matricule_bus := matricule";
		$res = -1;

		try{
			$envoie = $base->prepare($req);
			$envoie->execute(array( 
					":matricule" 		=> $matricule
				));
			$res = $envoie->fetchall();

		}catch(Exception $e){
			$res = -2;
		}

		return $res;

	}

	function select_all_bus($ligne){
		/*
		selectionner tous les bus de la ligne
		*/

		$req = "SELECT * FROM bus WHERE nom_ligne := nom_ligne";
		$res = -1;

		try{
			$envoie = $base->prepare($req);
			$envoie->execute(array( 
					":nom_ligne" 		=> $ligne
				));
			$res = $envoie->fetchall();
		}catch(Exception $e){
			$res = -2;
		}
		return $res;

	}

	function select_positionBus($id_position){
		/*
		Selectionner une position
		*/
		$req = "SELECT * FROM positionBus WHERE id_positionBus := id_position";

		$res = -1;

		try{
			$envoie = $base->prepare($req);
			$envoie->execute(array( 
					":id_position" 		=> $id_position
				));
			$res = $envoie->fetchall();

		}catch(Exception $e){

		}

		return $res;

	}

	function select_bus_parameters($matricule){
		/*
		Selectionner tous les parametres du bus
		*/
		$req = "SELECT nom_ligne,position_courante,sens_bus,latitude,longitude,altitude,vitesse,ladate FROM bus,positionBus WHERE matricule_bus := matricule AND bus.id_bus = positionBus.id_bus";

		$res = -1;

		try{
			$envoie = $base->prepare($req);
			$envoie->execute(array( 
					":matricule" 		=> $matricule
				));
			$res = $envoie->fetchall();

		}catch(Exception $e){
			$res = -2
		}

		return $res;

	}



	function near_bus($ligne, $position){
		/*
			le bus le plus proche
		*/
	}

	function localize_all_bus($ligne){
		/*
		localise tous les bus de la ligne
		*/
		$les_bus = select_all_bus($ligne)
		if($les_bus != -1 && $les_bus != -2 && count($les_bus) > 0){
			for($i=0; $i<count($les_bus); $i++){
				$matricule = $les_bus[$i][$]
			}
		}
	}

	function localize_client(){
		/*
			localiser le client en donnant ses coordonnées GPS
		*/
	}


?>
