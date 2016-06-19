<?php

	/* classe de base pour les requetes aux bases de données */
	Class BaseDD{
		private $base;
		public $running = False;
		private $baseName;
		private $userName;
		private $password;
		private $hostName;


		public function __construct($hostName, $baseName, $userName, $password){
			$this->baseName = $baseName;
			$this->userName = $userName;
			$this->hostName = $hostName;
			$this->password = $password;
			$this->connect();
		}

		/*
			connexion à la base 
		*/
		private function connect(){

				$req1 = "mysql:host=" . $this->hostName . ";dbname=" . $this->baseName . "";
				$req2 = "SET NAMES UTF8";

				try{
					$this->base = new PDO($req1, $this->userName, $this->password);
					$req = $this->base->prepare($req2);
					$req->execute();
					$this->running = True;

				}catch(Exception $e){
					$this->running = False;
				} 
		}

		function deconnect(){
			try{
				$this->close();
				$this->running = False;
			}catch(Exception $e){

			}
			
		}

		/* requete de selection */
		private function select($req, $array_params){
			$req = $this->base->prepare($req);
			$req->execute($array_params);
			return $req->fetchall(PDO::FETCH_NUM);
		}

		/* requete d'insertion */
		private function insert($req, $array_params){
			$req = $this->base->prepare($req);
			$req->execute($array_params);
			return $this->base->lastInsertId();
		}

		private function update($req, $array_params){
			$req = $this->base->prepare($req);
			$req->execute($array_params);
		}

		private function delete($req, $array_params){
			$req = $this->base->prepare($req);
			$req->execute($array_params);
		}

		/*
			fonctions associées à la base de données
		*/

		/* selectionner un bus */
		function selectBus($id_bus){
			$req = "SELECT * FROM bus WHERE id_bus=:id_bus";
			$array_params = array(
				"id_bus" => $id_bus
			);
			return $this->select($req, $array_params);
		}

		/* selectionner le bus grace à son matricule */
		function selectBusByMatricule($matricule){
			$req = "SELECT * FROM bus WHERE matricule_bus=:mat";
			$array_params = array(
				":mat" => $matricule
			);
			return $this->select($req, $array_params);
		}

		function selectBusByLigneName($nom_ligne){
			$req = "SELECT bus.id_bus,matricule_bus,nom_ligne,latitude,longitude,altitude,vitesse,ladate,heure,sens_bus FROM bus,positionBus WHERE nom_ligne=:nom_ligne AND positionBus.id_positionBus=bus.position_courant";
				
			$array_params = array(
				"nom_ligne" => $nom_ligne
			);
			return $this->select($req, $array_params);
		}

		/* selectionner une ligne */
		function selectLigne($id_ligne){
			$req = "SELECT * FROM ligne WHERE id_ligne=:id_ligne";
			$array_params = array(
				"id_ligne" => $id_ligne
			);
			return $this->select($req, $array_params);
		}


		function selectArretsLigne($nom_ligne, $sens = "-1"){
			if($sens == "-1" or $sens == ""){
				$req = "SELECT * FROM arretLigne WHERE id_ligne=:id_ligne";
				$array_params = array(
					"id_ligne" => $id_ligne
				);
			}else{
				$req = "SELECT * FROM arretLigne WHERE id_ligne=:id_ligne AND sens=:sens";
				$array_params = array(
					":id_ligne" => $id_ligne,
					":sens" => $sens
				);
			}
			
			return $this->select($req, $array_params);
		}

		function selectArretsLigneRestant($id_ligne, $sens, $num_ref){
			if($sens == "A"){
				$req = "SELECT arret.id_arret,arret.nom_arret,arret.latitude_arret,arret.longitude_arret,arretLigne.num_arretDansLigne,arretLigne.distance_tonext FROM arret, arretLigne WHERE arret.id_arret=arretLigne.id_arret AND id_ligne=:id_ligne AND sens='A' AND num_arretDansLigne<=:num_ref AND num_arretDansLigne>=0";
				$array_params = array(
					"id_ligne" => $id_ligne,
					":num_ref" => $num_ref
				);
			}else{
				$req = "SELECT * FROM arretLigne WHERE id_ligne=:id_ligne  AND sens='R' AND num_arretDansLigne>=:num_ref AND num_arretDansLigne>=0";
				$array_params = array(
					":id_ligne" => $id_ligne,
					":num_ref" => $num_ref
				);
			}
			
			return $this->select($req, $array_params);
		}

		function selectAllArret(){
			$req = "SELECT * FROM arret";
			$array_params = array(		
			);
			
			return $this->select($req, $array_params);
		}

		function selectAllArretBusAnc(){
			$req = "SELECT * FROM arretBus";
			$array_params = array(		
			);
			
			return $this->select($req, $array_params);
		}

		/* selectionner tous les arrets de la zone sur la ligne demandee */
		function selectAllArretZones($delta_lat, $delta_lng, $id_ligne, $lat_ref, $lng_ref, $sens){

			$req = "SELECT arret.id_arret,arret.nom_arret,arret.latitude_arret,arret.longitude_arret,arretLigne.num_arretDansLigne,arretLigne.distance_tonext FROM arretLigne, arret WHERE arret.id_arret=arretLigne.id_arret AND arretLigne.sens=:sens AND arretLigne.id_ligne=:id_ligne AND arret.latitude_arret<=:max_lat AND arret.latitude_arret >=:min_lat AND arret.longitude_arret<=:max_lng AND arret.longitude_arret>=:min_lng";
			$array_params = array(	
				":id_ligne" => $id_ligne,
				":max_lat" => $lat_ref+$delta_lat,
				":min_lat" => $lat_ref-$delta_lat,
				":max_lng" => $lng_ref+$delta_lng,
				":min_lng" => $lng_ref-$delta_lng,
				":sens" => $sens
			);
			
			return $this->select($req, $array_params);
		}

		function selectArretsProches($lat, $lng, $id_ligne){
			$req = "SELECT * FROM arretLigne WHERE id_ligne=:id_ligne AND ";
			$array_params = array(
				"id_ligne" => $id_ligne
			);
			return $this->select($req, $array_params);
		}


		/* supprimer un bus */
		function deleteBus($id_bus){
			$req = "DELETE FROM bus WHERE id_bus=:id_bus";
			$array_params = array(
				"id_bus" => $id_bus
			);
			$this->delete($req, $array_params);
		}

		/* supprimer une ligne */
		public function deleteLigne($id_ligne){
			$req = "DELETE FROM ligne WHERE id_ligne=:id_ligne";
			$array_params = array(
				"id_ligne" => $id_ligne
			);
			return $this->delete($req, $array_params);
		}

		/*
			jouter un produit
		*/
		function addBus($nom, $prix_unitaire, $type_produit, $photo){
			$req = "INSERT INTO bus VALUES(:nom,:prix_unitaire,:type_produit,:photo);";
			$array_params = array(
				":nom" => $nom,
				":prix_unitaire" => $prix_unitaire,
				":type_produit" => $type_produit,
				":photo" => $photo
			);
			$this->insert($req, $array_params);
		}

		/*
			ajouter une position de bus
		*/
		function addPositionBus($id_bus, $latitude, $longitude, $altitude, $vitesse, $lheure, $ladate){
			$req = "INSERT INTO positionBus(id_bus,latitude, longitude,altitude,vitesse,ladate,heure) VALUES(:id_bus, :latitude, :longitude, :altitude, :vitesse, :lheure, :ladate);";
			$array_params = array(
				":latitude" => $latitude,
				":longitude" => $longitude,
				":altitude" => $altitude,
				":vitesse" => $vitesse,
				":lheure" => $lheure,
				":ladate" => $ladate,
				":id_bus" => $id_bus
			);
			return $this->insert($req, $array_params);
		}


		function addLigne($nom, $prix_unitaire, $type_produit, $photo){
			$req = "INSERT INTO produit VALUES(:nom,:prix_unitaire,:type_produit,:photo);";
			$array_params = array(
				":nom" => $nom,
				":prix_unitaire" => $prix_unitaire,
				":type_produit" => $type_produit,
				":photo" => $photo
			);
			$this->insert($req, $array_params);
		}

		/* modifier le bus */
		function modifyBus($id_bus, $position="-1", $sens="-1"){

			if($position != -1){
				if($sens != -1){
					$req = "UPDATE bus SET sens_bus=:sens, position_courant=:position WHERE id_bus=:id_bus";
					$array_params = array(
						":sens" => $sens,
						":position" => $position,
						":id_bus" => $id_bus
					);
				}else{
					$req = "UPDATE bus SET position_courant=:position WHERE id_bus=:id_bus";
					$array_params = array(
						":position" => $position,
						":id_bus" => $id_bus
					);
				}
			}else{
				if($sens != -1){
					$req = "UPDATE bus SET sens_bus=:sens WHERE id_bus=:id_bus";
					$array_params = array(
						":sens" => $sens,
						":id_bus" => $id_bus
					);
				}else{

				}
			}
			
			$this->update($req, $array_params);
		}

		function modifyArret($id_arret, $lat, $lng){
			$req = "UPDATE arret SET latitude_arret=:lat, longitude_arret=:lng WHERE id_arret=:id_arret";
			$array_params = array(
						":lat" => $lat,
						":lng" => $lng,
						":id_arret" => $id_arret
						
			);
				
			
			$this->update($req, $array_params);
		}

		function modifyArretByName($nom_arret, $lat, $lng){
			$req = "UPDATE arret SET latitude_arret=:lat, longitude_arret=:lng WHERE nom_arret=:nom_arret";
			$array_params = array(
						":lat" => $lat,
						":lng" => $lng,
						":nom_arret" => $nom_arret
						
			);
				
			
			$this->update($req, $array_params);
		}

		function getIdArret($nom_arret){

		}
		
		function getIdLigne($nom_ligne){
			$req = "SELECT * FROM ligne WHERE nom_ligne=:nom_ligne";
			$array_params = array(
				"nom_ligne" => $nom_ligne
			);
			return intval($this->select($req, $array_params)[0][0]);
		}



		function getIdBus($matricule){

		}
		function getArretParameters($nom_arret, $id_arret){

		}

		function getSMSRecu(){

		}

		function delSMSRecu($id_sms){

		}

		
		/*
			getters et setters
		*/
		function getX(){

		}

		function setX(){

		}

	}


?>
