<!DOCTYPE html>
<html>
   <head>
       <title>Localisation en ligne</title>
       <meta charset=utf-8>
	   <link rel="stylesheet" media="screen" type="text/css" href="styles/design.css" />
	   <link rel="stylesheet" media="screen" type="text/css" href="styles/menu.css" />
	   <link rel="stylesheet" href="leaflet/leaflet.css" />
	   
	   <link rel="shortcut icon" type="image/x-icon" href="images/local.jpg" />
	</head>
	<body>
	<?php
		echo'<div id="conteneur">
			
		   <nav id="navigation">
				<a href="#" class="nav-btn">HOME<span></span></a>
				<ul>
					<li><a href="Accueil.php">Accueil</a></li>
					<li><a href="Apropos.php">A propos</a></li>
					<li class="active"><a href="Localisation.php">Localiser mon bus</a></li>
					<li><a href="#">Lignes et itinéraires</a></li>
				</ul>
				<div class="cl">&nbsp;</div>
			</nav>
		   
		   <div id="header"><img src ="images/senebuslocal.png" alt ="" width="500" style="position:absolute:0px;" vspace="10"> </div>
		   <div id="après-header">
		   <table align="center" width="80%" bgcolor=""></br></br>	
					<tr>
						<td width="30%" align="left"> <img src ="images/senegal.jpg" alt ="" width="100" style="position:absolute:0px;"> </td>
						<td align="right" width="40%" valign="top">
							<table>
							</br><tr><td><b><marquee direction="left" scrolldelay="100" bgcolor = "" width="300">Pour la localisation en ligne de vos bus</marquee></b></td></tr>
							</table>
		
						</td>
					</tr>
			</table></br></br></div>
			
			<div id="avant-map">
			<table>
				<tr>
						<td  align="right" bgcolor=""><h4>Saisissez une ligne de bus</h4></td>
						<td  align="center" width="5"><input type="number" id="bussearch" name="search" width="500"/></td>
						<td align="center" width="5"><input type="submit"   name="rechercher" value="Localiser" id="search-btn2"/></td>
						</tr>
				</table>
			</div>
			
			<div id="map" style="height:500px;"></div>
			
			
		   <div id="footer">
                    <div class="footer-nav">
					<ul>
						<li><a href="#">Accueil</a></li>
						<li><a href="#">A propos</a></li>
						<li><a href="#">Localiser mon bus</a></li>
						<li><a href="#">Lignes et itininéraires</a></li>
					</ul>
					<div class="cl">&nbsp;</div>
					</div>
                     <p class="copy">&copy; Copyright 2016<span>|</span>Senebuslocalisation. Design by DIC2TRStudents ESP</p>
				<div class="cl">&nbsp;</div>
           </div>
		</div>';
		?>

		<script type="text/javascript" src="leaflet/leaflet-src.js"></script>
        <script type="text/javascript" src="leaflet/leaflet-realtime.js"></script>
        <script type="text/javascript" src="mapping.js"></script>
	</body>
</html>