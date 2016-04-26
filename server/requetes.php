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
?>
