<?php
	/* controller */

	/*
		envoyer des donnees à l'url
	*/
	function sendToRemote($url, $data){
		file_get_contents("$url?donnees=$data");
	}
	
	if(isset($_POST['donnees']) && $_POST['donnees'] != ""){
		$msg = explode(" ", $_POST['donnees']);
		$entete = $msg[0];

		if($entete == "bus"){
			$msg[0] = "";
			$msg = implode(" ", $msg);
			sendToRemote("https://bustracking-kamsapp.rhcloud.com/remote_request.php",$msg);
		}else if($entete == "pluvio"){
			$msg[0] = "";
			$msg = implode(" ", $msg);
			sendToRemote("http://pluviodic2-dgiesp.rhcloud.com/testClient.php",$msg);
		}
	}


	

	
?>