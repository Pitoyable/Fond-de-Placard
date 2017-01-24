<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<h1>Administration</h1>
<a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
<a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
<a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>
<?php var_dump($array); ?>
<form class="" action="<?= $this -> url('Administration_updateTheme')?>" method="post">
  <label for="">
    <input type="text" name="name" value="<?= $array['the_name'] ?>">
  </label>
  <input type="submit" name="" value="mise à jour">
  <input type="hidden" name="id" value="<?= $array['id'] ?>">
</form>

<?php $this->stop('main_content') ?>