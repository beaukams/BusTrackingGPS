<html>
	<head>
		<title>Localisation en ligne</title>
		<meta charset=utf-8>
		
		<script type="text/javascript" src="OpenLayers/lib/OpenLayers.js"></script>
		<script type="text/javascript" src="carte.js"></script> 
		<link rel="stylesheet" href="style.css" type="text/css">
		<link rel="stylesheet" href="menu.css" type="text/css">
	</head>
		<body bgcolor="white"  onload="init()">

<?php
echo ' <table align="center" width="80%">	
		<tr><td width="30%"> <img src ="senegal.jpg" alt ="" width="100" style="position:absolute:20px;"> </td>
		
		<td align="center"  width="35%"><p><font size="5" color="green" face="Book antiqua"><b>SENEBUSLOCALISATION</b></font></p></td>
		
		<td align="right" width="35%" valign="top">
			<table>
				</br><tr><td><b><marquee direction="left" scrolldelay="100" bgcolor = "" width="350">Pour la localisation en ligne de vos bus</marquee></b></td></tr>
				
		</tr>
			</table>
		
		</td>

</table> ';
	
	
	
echo '<table id="i" align="center" width="80%">	
		<tr><td colspan="3" valign="top"  height="3" id="e"><h3> <font size="8" color="green" face="andalus"><marquee direction="left"></marquee></font><h3></td></tr>
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
    <a href="SenebusLocalisation.php"><span>Accueil</span></a>
    <a href="Apropos.php" class="current"><span align="center">A propos</span></a>
    <a href="#3"><span>Lignes et itinéraires</span></a>
	</div>
<div class="menu4sub"> </div>
	</td>
	<td  align="right" bgcolor="">Saisissez une ligne de bus</td>
	<td  align="center" width="5"><input type="text"   name="search" width="100%"/></td>
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
		<td><img src="bus.jpeg" alt="Bus" width="330" height="330" hspace="30" vspace="0" align="left"><p>SeneBusLocalisation est est le premier site web de localisation en ligne de vos bus au Senegal.</br></br>
Partout où vous êtes renseignez vous sur la position de votre bus à temps réel pour mieux</br></br> optimiser votre temps.</br></br>
Les services offerts :</br></br>
-Renseignement sur la localisation de votre bus</br></br>
-Des informations sur les bus, les arrêts et itinéraires.</br></br>
SeneBusLocation à votre service pour une meilleure optimisation du temps que vous perdez dans </br></br>  les arrêts bus. </p></td>
		
	</tr>
	
</table>
	

	
	
		<table align="center" width="80%">
		<tr bgcolor="CAE1FF" >
		<td colspan="3" align="center" valign="bottom">Copyright © 2016</td></tr>
		</table>
</table>';
?>		
	</body>
</html>
