<?php
//	$_GET['text']  = "ligne 13";
//	$_GET['num'] = "773675372";

	if(isset($_GET['text']) && isset($_GET['num'])){
		$message  = $_GET['text'];
		$numero = $_GET['num'];
		

		if(file_exists("requetes.php")){
			include_once("requetes.php");

			$base = connexion_base();
			
			if($base != -1){
				$res = insert_recvSms($message, $numero, $base);
			}
				
		}
	}
?>
