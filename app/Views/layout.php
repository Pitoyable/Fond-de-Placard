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

		<!-- TynyMCE -->
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script>

		<!-- Script Javascript -->
		<script src="<?= $this -> assetUrl('js/script.js') ?>"></script>
		<script src="<?= $this -> assetUrl('js/master.js') ?>"></script>

		<!-- Google Font -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
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
					<?php if (!empty($_SESSION)) {?>
					<a href="<?= $this -> url ('User_display') ?>">Mon compte</a>
					<a href="<?= $this -> url ('Administration_home') ?>">Admin</a>
					<?php } ?>
				</nav>
			</aside>

			<header class="header-nav">
				<nav class="desktop-nav">
					<a href="<?= $this -> url ('default_home') ?>">Accueil</a>
					<a href="<?= $this -> url ('Recipe_display') ?>">J'ai faim</a>
					<a href="<?= $this -> url ('Theme_display') ?>">Soirée</a>
					<a href="<?= $this -> url ('Provide_display') ?>">Se fournir</a>
					<a href="<?= $this -> url ('Info_display') ?>">Nous contacter</a>
					<?php if(!empty($_SESSION)) { ?>
						<a href="<?= $this -> url ('User_display') ?>">Mon compte</a>
					<?php } ?>
				</nav>

				<div class="login-connect">
					<?php if(empty($_SESSION)){ ?>

						<!-- A masquer si l'utilisateur est co -->
						<button id="connect_button" class="connect_button" type="button">Login</button>
					<?php }else { ?>
						<!-- A afficher uniquement si logué -->
						<h3 class="connected">Bienvenue <?= $_SESSION['user']['use_pseudo'] ?></h3>
						<a class="connected" href="<?= $this->url('User_logout') ?>"><i class="fa fa-power-off" aria-hidden="true"></i></a>

						<!-- Si l'utilisateur est un admin -->
						<?php if($_SESSION['user']['group_gro_id'] == 1){ ?>
							 <a href="<?= $this -> url ('Administration_home') ?>">Admin</a>

						<?php }
					 } ?>

				</div>
			</header>

			<div id="overlay" class="overlay">
				<p><i id="close" class="fa fa-times-circle-o" aria-hidden="true"></i></p>
				<div class="login-box">
					 <div class="lb-header">
						 <a href="#" class="active" id="login-box-link">Se connecter</a>
						 <a href="#" id="signup-box-link">S'inscrire</a>
					 </div>
					 <form class="email-login"  action="<?= $this->url('User_login') ?>" method="post">
						 <p class="u-form-group">
							 <input type="email" placeholder="Email" name="email" required/>
						 </p>
						 <p class="u-form-group">
							 <input type="password" placeholder="Mot de passe" name="password"  required/>
						 </p>
						 <div class="u-form-group">
							 <button>Connexion</button>
						 </div>
					 </form>
					 <form class="email-signup" action="<?= $this->url('User_signUp') ?>" method="post">
						 <p class="u-form-group">
							 <input type="text" placeholder="Pseudo" name="pseudo"  required/>
						 </p>
						 <p class="u-form-group">
							 <input type="email" placeholder="Email" name="email"  required/>
						 </p>
						 <p class="u-form-group">
							 <input type="password" placeholder="Mot de passe" name="password"  required/>
						 </p>
						 <p class="u-form-group">
							 <input type="password" placeholder="Confirmer votre mot de passe" name="password_check"  required/>
						 </p>
						 <p class="u-form-group">
							 <button>S'inscrire</button>
						 </p>
					 </form>
				 </div>
			</div> <!-- Fin de l'overlay -->

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
