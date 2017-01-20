<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?= $this->e($title) ?></title>

		<!-- JQ -->
		<script
	    src="http://code.jquery.com/jquery-3.1.1.min.js"
	    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
	    crossorigin="anonymous"></script>

		<!-- Script Javascript -->
		<script src="<?= $this -> assetUrl('js/script.js') ?>"></script>
		<script src="<?= $this -> assetUrl('js/master.js') ?>"></script>

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Boogaloo" rel="stylesheet">

		<!-- Font Awesome -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

	</head>
	<body id="body">
		<div class="wrapper">
			<aside class="sidebar">
				<nav id="navigation" class="mobile-nav" role="navigation">
					<a href="<?= $this -> url ('default_home') ?>">Accueil</a>
					<a href="<?= $this -> url ('Recipe_display') ?>">J'ai faim</a>
					<a href="<?= $this -> url ('Theme_display') ?>">Soirée</a>
					<a href="<?= $this -> url ('Provide_display') ?>">Se fournir</a>
					<a href="<?= $this -> url ('Info_display') ?>">Nous contacter</a>
					<a href="<?= $this -> url ('User_display') ?>">Mon compte</a>
					<a href="<?= $this -> url ('Administration_home') ?>">Admin</a>
				</nav>
			</aside>

			<header class="header-nav">
				<nav class="desktop-nav">
					<a href="<?= $this -> url ('default_home') ?>">Accueil</a>
					<a href="<?= $this -> url ('Recipe_display') ?>">J'ai faim</a>
					<a href="<?= $this -> url ('Theme_display') ?>">Soirée</a>
					<a href="<?= $this -> url ('Provide_display') ?>">Se fournir</a>
					<a href="<?= $this -> url ('Info_display') ?>">Nous contacter</a>
					<a href="<?= $this -> url ('User_display') ?>">Mon compte</a>
				</nav>

				<div class="login-connect-desktop">

					<?php if(empty($_SESSION)){ ?>

						<!-- A masquer si l'utilisateur est co -->
						<a href="<?= $this -> url ('User_acess') ?>"><i class="fa fa-user" aria-hidden="true"></i>Connexion/Inscription</a>
					<?php }else { ?>
						<!-- A afficher uniquement si logué -->
						<h3>Bienvenue <?= $_SESSION['user']['use_pseudo'] ?></h3>
						<a href="<?= $this->url('User_logout') ?>"><i class="fa fa-power-off" aria-hidden="true"></i></a>
					<?php } ?>

					<!-- Si l'utilisateur est un admin -->
					<!-- <a href="<?= $this -> url ('Administration_home') ?>">Admin</a> -->
				</div>
			</header>

			<div class="main">
				<header class="header-main">
					<!-- A masquer en desktop -->
					<a href="#body" class="nav-button-open" aria-label="open navigation"></a>
					<a href="#" class="nav-button-close" aria-label="close navigation"></a>
					<!-- Pas à masquer -->
					<div class="div_logo">
						<a href="<?= $this -> url ('default_home') ?>"><img class="logo" src="<?= $this->assetUrl('pictures/test3.png') ?>" alt=""></a>
					</div>
				</header>

				<section>
					<?= $this->section('main_content') ?>
				</section>

			</div>

			<footer>
				Copyright (c) 2017 Copyright Holder All Rights Reserved.
				<p></p>
				<p></p>
			</footer>
		</div>
	</body>
</html>
