<?php 
include("connexion.php");
$idArret=$_GET['idArret'];
echo $idArret;
//$nomArret=$_POST['nomArret'];
//$latitudeArret=$_POST['latitudeArret'];
//$longitudeArret=$_POST['longitudeArret'];
//$date=$_POST['date'];
$requete="DELETE FROM arretBus WHERE idArret='".$idArret."'";
echo $requete;
$i=$bdd->exec($requete);
if($i==1){
	echo'<h1><font color="blue">suppression reussie</font></h1>';
include("select.php");
}
else
	echo'non';
?>