
<html>
<head>
<title></title>
<STYLE>
		LABEL{
			font-size:30px;
			color:#4000A0;
		}
	.champ { font-size:20px; }
	body{
		background-image: url(font.jpg);
	}
	</STYLE>
</head>
<body>


<table width="100%" height="100%"  cellspacing=0 >
	<tr>
		<td colspan=2 align=center valign=center>
			<img src="logo.png" width="80%" height="30%">
		</td>
	</tr>
	<tr height="90%">
		<td align=center valign=center>
			<table width="100%"  >
				<tr>
					<td colspan=2 bgcolor="blue" >
						autre liens
					</td>
				</tr>
				<tr>
				<td bgcolor="blue"></td >	<td bgcolor="#FFCCCC"><a href="select.php">recherche</a></td>
				</tr>
				<tr>
				<td bgcolor="blue"></td >	<td bgcolor="#FFCCCC"><a href="modification3.php">modifier</a></td>
				</tr>
				<tr>
				<td bgcolor="blue"></td >	<td bgcolor="#FFCCCC"><a href="suppression2.php">suppression</a></td>
				</tr>
				

			</table>
				
		</td>
		<td align=center valign=center width="80%">
		<CENTER><FONT size="12" color="blue">formulaire de projet de bus </FONT> </CENTER>
<fielset>	
	<form method="POST" action="gerer.php">
	<TABLE width="70%" height="300" align="center" cellspacing="10" bgcolor="#FFFFCC">
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
		</td>
	</tr>
	<tr bgcolor="#FFCCCC">
		<td colspan=2 align=center valign=center>
		<marquee color="blue"><h1>Université Cheikh Anta Diop (UCAD) &nbsp &nbsp &nbsp &nbsp Ecole Superieure Polytechnique(ESP)</h1></marquee>
			
		</td>
	</tr>
</table>
</body>
</html>