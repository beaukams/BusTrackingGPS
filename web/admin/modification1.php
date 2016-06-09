<?php 
include('connexion.php');
$id=$_GET['idArret'];
echo"".$id."";
$requete="SELECT * FROM arretBus where idArret='".$id."'";
echo"<br>".$requete."";
$re=$bdd->query($requete);
$rows=$re->fetch();
$nomArret=$rows['nomArret'];
$latitudeArret=$rows['latitudeArret'];
$longitudeArret=$rows['longitudeArret'];
$vitesse=$rows['vitesse'];
$date=$rows['date'];
?>
<form method="POST" action="modification2.php">
	<TABLE width="700" heigth="600" align="center" cellspacing="10" bgcolor="#FFFFCC">
		<TR>
			<TD></TD> <TD></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-nomArret">nomArret</LABEL></TD> <TD width="150" height="30"><input type="text" name="nomArret" size="30" class="champ" value="<?php echo $nomArret;   ?>"></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-latitudeArret">latitudeArret</LABEL></TD> <TD width="150" height="30"><input type="text" name="latitudeArret" size="30" class="champ" value="<?php echo $latitudeArret; ?>"></TD>  <TD></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-longitudeArret">longitudeArret</LABEL></TD> <TD width="150" height="30"><input type="text" name="longitudeArret" size="30" class="champ" value="<?php echo $longitudeArret; ?>"></TD>  <TD></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-vitesse">vitesse</LABEL></TD> <TD width="150" height="30"><input type="text" name="vitesse" size="30" class="champ" value="<?php echo $vitesse; ?>"></TD>  <TD></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-date">date</LABEL></TD> <TD width="150" height="30"><input type="text" name="date" size="30" class="champ" value="<?php echo $date ;?>"></TD>  <TD></TD> 
		</TR>

		
		<TR>
			<TD></TD> <TD></TD> 
		</TR>
		<TR>
			<TD></TD> <TD></TD> 
		</TR>
		<TR>
			<TD></TD><TD><input name="test" type="submit" value="ajouter">
</TD> <TD><input name="test" type="submit" value="supprimer"></TD> <TD><input name="modifier" type="submit" value="modifier"></TD><TD><input name="raz" type="reset" value="Re-initialiser"></TD> <TD></TD>
		</TR>
		<TR>
			<TD></TD> <TD><input name="test" type="submit" value="rechercher arret bus"></TD>
		</TR>
	</TABLE>
</form>