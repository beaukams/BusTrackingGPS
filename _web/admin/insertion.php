<?php
include("connexion.php");

$nomArret=$_POST['nomArret'];
$latitudeArret=$_POST['latitudeArret'];
$longitudeArret=$_POST['longitudeArret'];
$vitesse=$_POST['vitesse'];
$date=$_POST['date'];
echo $nomArret."- ".$latitudeArret."- ".$longitudeArret."- ".$vitesse."- ".$date."<br/>";
$rep=$bdd->prepare('INSERT INTO arretBus(nomArret,latitudeArret,longitudeArret,vitesse,date) VALUES (:nomArret,:latitudeArret,:longitudeArret,:vitesse,:date)');
$ok=$rep->execute(array(
				
				'nomArret' =>$nomArret ,
				'latitudeArret' =>$latitudeArret ,
				'longitudeArret' =>$longitudeArret ,
				'vitesse' =>$vitesse ,
				'date' =>$date 
				
				 ));
if(!$ok){
echo "l'ajout n'a pas reussie";
}
else{
	echo "l'ajout a reussie";
}
?>