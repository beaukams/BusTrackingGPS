<HTML>
<HEAD>
	<TITLE>
		formulaire d'ajout 
	</TITLE>
	<STYLE>
		LABEL{
			font-size:30px;
			color:#4000A0;
		}
	.champ { font-size:20px; }
	</STYLE>

</HEAD>


</BODY>
<div bgcolor="black">
	<CENTER><FONT size="12" color="blue">formulaire de projet de bus </FONT> </CENTER>
<fielset>	
	<form method="POST" action="gerer.php">
	<TABLE width="700" height="300" align="center" cellspacing="10" bgcolor="#FFFFCC">
		<TR>
			<TD></TD> <TD></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-nomArret">nomArret</LABEL></TD> <TD width="150" height="30"><input type="text" name="nomArret" size="30" class="champ"></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-latitudeArret">latitudeArret</LABEL></TD> <TD width="150" height="30"><input type="text" name="latitudeArret" size="30" class="champ"></TD>  <TD></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-longitudeArret">longitudeArret</LABEL></TD> <TD width="150" height="30"><input type="text" name="longitudeArret" size="30" class="champ"></TD>  <TD></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-vitesse">vitesse</LABEL></TD> <TD width="150" height="30"><input type="text" name="vitesse" size="30" class="champ"></TD>  <TD></TD> 
		</TR>

		<TR>
			<TD></TD><TD  width="100" height="30"><LABEL for="text-date">date</LABEL></TD> <TD width="150" height="30"><input type="text" name="date" size="30" class="champ"></TD>  <TD></TD> 
		</TR>

		
		<TR>
			<TD></TD> <TD></TD> 
		</TR>
		<TR>
			<TD></TD> <TD></TD> 
		</TR>
		<TR>
			<TD></TD><TD><input name="test" type="submit" value="ajouter">
</TD> <TD><input name="test" type="submit" value="supprimer"></TD> <TD><input name="test" type="submit" value="modifier"></TD><TD><input name="raz" type="reset" value="Re-initialiser"></TD> <TD></TD>
		</TR>
		<TR>
			<TD></TD> <TD><input name="test" type="submit" value="rechercher arret bus"></TD>
		</TR>
	</TABLE>
</form>
	</FIELDSET>
</BODY>
