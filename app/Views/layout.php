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

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">

</head>
<body id="body">
	<aside class="sidebar">
		<nav id="navigation" class="navigation" role="navigation">
			<a href="<?= $this -> url ('default_home') ?>">Accueil</a>
			<a href="<?= $this -> url ('Recipe_display') ?>">J'ai faim</a>
			<a href="<?= $this -> url ('Theme_display') ?>">Soirée à theme</a>
			<a href="<?= $this -> url ('Provide_display') ?>">Se fournir</a>
			<a href="<?= $this -> url ('Info_display') ?>">Nous contacter</a>
			<a href="<?= $this -> url ('User_display') ?>">Mon compte</a>
			<a href="<?= $this -> url ('Administration_home') ?>">Administration</a>

		</nav>
	</aside>

	<div class="wrapper">
		<header id="header" class="header-wrap">
			<a href="#body" class="nav-button-open" aria-label="open navigation"></a>
			<a href="#" class="nav-button-close" aria-label="close navigation"></a>
			<div class="div_logo">
				<a href="<?= $this -> url ('default_home') ?>"><img class="logo" src="<?= $this->assetUrl('pictures/test3.png') ?>" alt=""></a>
			</div>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>
