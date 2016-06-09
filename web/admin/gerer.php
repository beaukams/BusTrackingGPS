<?php 
$test=$_POST['test'];
switch($test){
	case 'ajouter':
	include("insertion.php");
	break;
	case 'rechercher arret bus':
	include("select2.php");
	break;
	case'modifier':
	include("modification4.php");
	break;
	case'supprimer':
	include("suppression3.php");
	default:
	echo 'mal';
}
?>