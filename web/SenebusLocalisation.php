<html>
	<head>
		<title>Localisation en ligne</title>
		<meta charset=utf-8>
		
		<script type="text/javascript" src="OpenLayers/lib/OpenLayers.js"></script>
		<script type="text/javascript" src="carte.js"></script> 
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="menu.css" type="text/css">
	</head>

		<body bgcolor="white">
	<?php

echo'<table align="center" width="80%">	
		<tr><td width="30%"> <img src ="senegal.jpg" alt ="" width="100" style="position:absolute:20px;"> </td>
		
		<td align="center"  width="30%" ><p ><font size="5" color="green" face="Book antiqua"><b>SENEBUSLOCALISATION</b></font></p></td>
		
		<td align="right" width="40%" valign="top">
			<table>
				</br><tr><td><b><marquee direction="left" scrolldelay="100" bgcolor = "" width="300">Pour la localisation en ligne de vos bus</marquee></b></td></tr>
				
		
			</table>
		
		</td>
		</tr>

</table>';
	
	
	
echo'<table id="i" align="center" width="80%">	
		<tr><td colspan="3" valign="top"  height="3" id="e"><h3> <font size="8" color="" face="andalus"><marquee direction="left"></marquee></font><h3></td></tr>
</table>		
	
	
			<table align="center" width="80%">	
				<tr height="25">
					<td colspan="3"> </td>
				</tr>
			</table>

			<table  align="center" width="80%">	
				<tr  height="15" bgcolor="white" >
				<td>
				<div class="menu4">
			    <a href="SenebusLocalisation.php" class="current"><span>Accueil</span></a>
			    <a href="Apropos.php"><span align="center">A propos</span></a>
			    <a href="#3"><span>Lignes et itinéraires</span></a>
				</div>
			<div class="menu4sub"> </div>
				</td>
				<td  align="right" bgcolor="">Saisissez une ligne de bus</td>
				<td  align="center" width="5"><input type="number" name="search" id="search" width="100%"/></td>
				<td align="center" width="5"><input type="submit"   name="rechercher" value="Localiser"/></td>

				</tr>
			</table>
				
			<table  align="center" width="80%">
				<tr height="25">
					<td colspan="3"> </td>
				</tr>
			</table>

			<table id="i" align="center" width="80%" height="350">
				
				<tr>
					<td><img src="Bussn.jpg" alt="Bus" width="320" height="300" hspace="10" vspace="15" align="left"></td>
					<td width="280" height="280"><div id="map"></div></td>
				</tr>
				
			</table>
	
			<table align="center" width="80%">
				<tr>
						<td><div id="label"></div>
						</td>
				</tr>
				<tr bgcolor="CAE1FF" >
					<td colspan="3" align="center" valign="bottom">Copyright © 2016</td>
				</tr>
			</table>
		</table>';
	?>		
	</body>
</html>
