<?php 

$a=$_POST['nomArret'];

$requete="SELECT nomArret,latitudeArret,longitudeArret,vitesse,date FROM arretBus where nomArret='".$a."'";
?>
<body>
<center><h4>resultat de la recherche de l' arret<?php echo $a; ?></h4></center>
<center>
<table width="600">
	<tr bgcolor = "blue">
			
			<th>latitudeArret</th>
			<th>longituteArret</th>
			<th>vitesse</th>
			<th>date</th>
		</tr>
<?php
include("connexion.php");
$reponse=$bdd->query($requete);
while($row=$reponse->fetch()){ ?>
<tr bgcolor="white">
			
			<td><?php echo $row['latitudeArret']; ?></td>
			<td><?php echo $row['longitudeArret']; ?></td>
			<td><?php echo $row['vitesse']; ?></td>
			<td><?php echo $row['date']; ?></td>
		</tr>
<?php 
}
?>
</table>
<a href="select.php">retour</a>
</center>



