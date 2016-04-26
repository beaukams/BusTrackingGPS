<?php

	if(file_exists("requetes.php")){
		include_once("requetes.php");
	

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

		/*
		* interpreteur de message
		*/
		function interpret_sms($message, $num){
			$msg = explode(" ",$message); //ex: ligne 10
			if($msg[0] == "ligne" && count($msg) == 2){
				$ligne = $msg[1];
				
				
			}
		}
	}
?>
