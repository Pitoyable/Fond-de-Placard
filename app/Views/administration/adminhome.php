<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<h1>Administration</h1>
<a href="<?= $this -> url('administration_user') ?>">Gestion des utilisateurs</a>
<a href="<?= $this -> url('administration_validReceipe') ?>">Validation des recettes</a>
<?php $this->stop('main_content') ?>
