<?php
	//executes les requetes distantes
	//$_POST['requete'] = "INSERT INTO ligne(nom_ligne, terminus1, terminus2) VALUES ('11','arret1', 'arret16')";
	//$_POST['type_requete'] = "insert";
	if(isset($_POST['type_requete']) && isset($_POST['requete'])){

		if(file_exists("../base_conf.php")){
			include_once("../base_conf.php");

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
				if($_POST['type_requete'] == "insert" && $_POST['requete'] != ""){
					insert($base, $_POST['requete']);
					
				}
			}
		}
	}

	function insert($base, $req){
		$req = $base->prepare($req);
		$req->execute(array());
	}

	function update($base, $req){
		$req = $base->prepare($req);
		$req->execute(array());
	}

	function remove($base, $req){
		$req = $base->prepare($req);
		$req->execute(array());
	}

	function select($base, $req){
		$req = $base->prepare($req);
		$req->execute(array());
		$res = $req->fetchall();
		//echo json_encode($res);
	}
	
?>