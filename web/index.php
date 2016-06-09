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
		$('#slider').slidertron({
			viewerSelector: '.viewer',
			indicatorSelector: '.indicator span',
			reelSelector: '.reel',
			slidesSelector: '.slide',
			speed: 'slow',
			advanceDelay: 4000
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
		<div class="viewer">
			<div class="reel">
				<div class="slide">
					<img src="images/im.jpg" alt=""  width="870" height="245"/>
				</div>
				<div class="slide">
					<img src="images/bus3.jpg" alt="" width="870" height="245"/>
				</div>
				<div class="slide">
					<img src="images/im13.jpg" alt="" width="870" height="245" />
				</div>
				<div class="slide">
					<img src="images/im20.jpg" width="870" height="245"/>
				</div>
				<div class="slide">
					<img src="images/im17.jpg" alt="" width="870" height="245"  />
				</div>
			</div>
		</div>
		<div class="indicator">
			<span>1</span>
			<span>2</span>
			<span>3</span>
			<span>4</span>
			<span>5</span>
		</div>
	</div>
	<div id="page">
		<div id="content">
			<div class="box">
				<h2>Bienvenue à PolytechLocalisation</h2>
				<p>
					 <strong>PolytechLocalisation.com</strong> a été mis en place pour permettre aux étudiants de l'Ecole Supérieure Polytechnique de Dakar(<strong> ESP</strong> ) de
				localiser la position de la <strong>ligne 10</strong> qui y passe. Le fonctionnement est simple. Cliquez qur le bouton "localiser mon bus" et obtenez la position de la ligne 10 qui vous ait le plus proche.<a href="localisation.php" class="blue-btn">localiser mon bus</a>
				</p>
			</div>
			<div class="box" id="content-box1">
				<h3></h3>
				<ul class="section-list">
					<li class="first">
						<img class="pic alignleft" src="images/im2.jpg" width="100" height="70" alt="" />
						<span>Prenez rendez-vous avec votre bus</span>
					</li>
					<li>
						<img class="pic alignleft" src="images/Bussn.jpg" width="100" height="70" alt="" />
						<span>Localisez votre bus là où vous êtes</span>
					</li>
					<li class="last">
						<img class="pic alignleft" src="images/im4.jpg" width="100" height="70" alt="" />
						<span>Optimisez votre temps</span>
					</li>
				</ul>
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
					<li class="last"><a href="#">Ante semper fringilla</a></li>
				</ul>
			</div>
			<div class="box">
				<h3>Evenements</h3>
				<div class="date-list">
					<ul class="list date-list">
						<li class="first"><span class="date">2/08</span> <a href="#">Quam sed tempus</a></li>
						<li><span class="date">2/05</span> <a href="#">Lorem et vestibulum</a></li>
						<li><span class="date">2/01</span> <a href="#">Risus aenean tellus</a></li>
						<li class="last"><span class="date">1/31</span> <a href="#">Tristique et primis</a></li>
					</ul>
				</div>
			</div>
		</div>
		<br class="clearfix" />
	</div>
 </div>
<div id="footer">
	&copy; Copyright. All rights reserved. Design by DIC2TRStudentsESP.
</div>
</body>
</html>