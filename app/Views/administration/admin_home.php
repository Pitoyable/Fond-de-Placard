<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<h1>Administration</h1>
<a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
<a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
<a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>
<?php $this->stop('main_content') ?>
