<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Big Business 2.0
Description: A two-column, fixed-width design with a bright color scheme.
Version    : 1.0
Released   : 20120624
-->
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>PolytechLocalisation</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="leaflet/leaflet.css" />
<!--link rel="stylesheet" href="menu.css" type="text/css"-->
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.dropotron-1.0.js"></script>
<script type="text/javascript" src="jquery.slidertron-1.1.js"></script>
<script type="text/javascript">
	$(function() {
		$('#menu > ul').dropotron({
			mode: 'fade',
			globalOffsetY: 11,
			offsetY: -15
		});
	});
</script>
</head>
<body">
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#"><img src="images/logo_ucad.jpg"></a></h1>
		</div>
		<div id="name">
			<h2>PolytechLocalisation</h2>
		</div>
		<div id="slogan">
			<h2><a href="#"><img src="images/esp.jpg" height="133" width="200"></a></h2>
		</div>
	</div>
	<?php
		include_once("./menu.php");
	?>
	
	<div id="avant-map">
	
		<table hidden>
				<tr>
						<td align="right" bgcolor=""><h5>Saisissez une ligne de bus</h5></td>
						<td align="center" width="5"><input type="number" id="bussearch" value="10"  name="search" width="500"/></td>
						<td align="center" width="5"><input type="submit" name="rechercher" value="Localiser" id="search-btn2"/></td>
				</tr>
		</table>
		
		<table>
				<tr>
					<td>
						<h5>Votre position:</h5>
					</td>
					<td>
						latitude:<label id="lab_lat"></label>
						
					</td>
					<td>
						longitude:<label id="lab_lng"></label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Le bus le plus proche</label>
					</td>
				</tr>
		</table>
		
		<table border="2" cellspacing="0">
						<thead>
							<tr>
								<th width="25%">Sens</th>
								<th width="25%">Localisation</th>
								<th width="15%">Distance restante (km)</th>
								<th width="25%">le plus proche</th>
								<th width="5%">arrets restants</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Vers Palais</td>
								<td id="loc_bus_palais"></td>
								<td id="dist_bus_palais"></td>
								<td id="arret_bus_palais"></td>
								<td id="rest_bus_palais"></td>
							</tr>

							<tr>
								<td>Vers Liberté5</td>
								<td id="loc_bus_liberte"></td>
								<td id="dist_bus_liberte"></td>
								<td id="arret_bus_liberte"></td>
								<td id="rest_bus_liberte"></td>
							</tr>
						</tbody>
		</table>
				
	</div>
	<br/>
	<br/>
	
	<div id="cover-map"> 
	
	<div id="map">
			
	</div>	

	</div>
 </div>
<div id="footer">
	&copy; Copyright. All rights reserved. Design by DIC2TRStudentsESP.
</div>
</div>
	<script type="text/javascript" src="leaflet/leaflet-src.js"></script>
    <script type="text/javascript" src="leaflet/leaflet-realtime.js"></script>
    <script type="text/javascript" src="mapping.js"></script>
</body>
</html>