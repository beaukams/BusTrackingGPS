<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Big Business 2.0
Description: A two-column, fixed-width design with a bright color scheme.
Version    : 1.0
Released   : 20120624
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="description" content="" />
<meta name="keywords" content="" />
<title>PolytechLocalisation</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
<body>
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
	
	<div id="slider">

					<img src="images/femme.jpg" alt=""  width="870" height="375"/>
	</div>			
	
	<div id="page">
		<div id="content">
			<div class="box">
				<h2>localisez la ligne 10 à temps réel</h2>
				<p>
					<img src="images/oui.jpg" height="160" width="280">
				</p>
			</div>
			<div class="box" id="content-box1">
				<h3></h3>
				<ul class="section-list">
					<li class="first">
						<img class="pic alignleft" src="images/im1.jpg" width="100" height="70" alt="" />
						<span>Renseignez-vous sur la position de la ligne 10</span>
					</li>
					<li>
						<img class="pic alignleft" src="images/im7.jpg" width="100" height="70" alt="" />
						<span>Suivez-le à temps réel </span>
					</li>
					<li class="last">
						<img class="pic alignleft" src="images/im12.jpg" width="100" height="70" alt="" />
						<span>Retrouver votre bus</span>
					</li>
				</ul>
			</div>
			<div class="box" id="content-box2">
				<h3>PolytechLocalisation en bref</h3>
				<p>
					 Le site web a été conçu par des étudiants de DIC2 du département genie informatique option Télécommunications et Réseaux dans le souci de répondre aux besoins de la grande majorité de leurs camarades qui prennent souvent la ligne 10 . Ainsi avec PolytechLocalisation, ils peuvent se renseigner sur la position de la ligne 10 à temps réel et mieux aménager leur temps sans courir le risque de rater leur bus. PolytechLocalisation avec vous et pour vous pour une optimisation de votre temps !
				</p>
			</div>
			<br class="clearfix" />
		</div>
		<div id="sidebar">
			<div class="box">
				<h3>Actualités</h3>
				<ul class="list">
					<li class="first"><a href="#">Adipiscing tincidunt</a></li>
					<li><a href="#">Euismod elit sollicitudin</a></li>
					<li><a href="#">Dolor magnis et lacinia</a></li>
					<li><a href="#">Mauris ornare aenean</a></li>
				</ul>
			</div>
		</div>
		
		<br class="clearfix" />
	</div>

</div>
<div id="footer">
	&copy; Copyright. All rights reserved. Design by DIC2TRStudentsESP.
</div>
</div>
</body>
</html>