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
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>
		<nav>
			<p><a href="recipe_afficher">J'ai faim</a></p>
			<p><a href="theme_afficher">Soirée</a></p>
			<p><a href="#">Se fournir</a></p>
			<p><a href="#">Nous contacter</a></p>
			<p><a href="user_update">Mon compte</a></p>
		</nav>
		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>
