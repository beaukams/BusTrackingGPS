<?php
include("connexion.php");
$nomArret=$_POST['nomArret'];
$latitudeArret=$_POST['latitudeArret'];
$longitudeArret=$_POST['longitudeArret'];
$vitesse=$_POST['vitesse'];
$date=$_POST['date'];
$res=$bdd->prepare('UPDATE arretBus SET latitudeArret=:latitudeArret,longitudeArret=:longitudeArret,vitesse=:vitesse,date=:date WHERE nomArret=:nomArret');
$rien=$res->execute(array(
	'latitudeArret' =>$latitudeArret , 
	'longitudeArret'=>$longitudeArret,
	'vitesse'=>$vitesse,
	'date'=>$date,
	'nomArret'=>$nomArret
	));
if($rien){
	echo '<SCRIPT LANGUAGE="javaScript">document.location.href="select.php"</SCRIPT>';
}
else{
	echo '<SCRIPT LANGUAGE="javaScript">document.location.href="modification1.php"</SCRIPT>';
}

?>