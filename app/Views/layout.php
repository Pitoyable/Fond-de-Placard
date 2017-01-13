<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<h1><a href="<?= $this -> url ('default_home') ?>">Accueil</a></h1>
		</header>
		<nav>
			<p><a href="<?= $this -> url ('Recipe_display') ?>">J'ai faim</a></p>
			<p><a href="<?= $this -> url ('Theme_display') ?>">Soirée</a></p>
			<p><a href="<?= $this -> url ('Provide_display') ?>">Se fournir</a></p>
			<p><a href="<?= $this -> url ('Info_display') ?>">Nous contacter</a></p>
			<p><a href="<?= $this -> url ('User_update') ?>">Mon compte</a></p>
		</nav>
		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>