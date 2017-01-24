<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<h1>Administration</h1>
<a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
<a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
<a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>


<form class="" action="<?= $this -> url('Administration_updateUser') ?>" method="post">
  <p>
    <label for="">Pseudo :
      <input type="text" name="pseudo" value="<?= $array['use_pseudo']?>">
    </label>
  </p>
  <p>
    <label for="">Email :
      <input type="text" name="email" value="<?= $array['use_email']?>">
    </label>
  </p>
  <p>
    <label for="">Groupe :
      <input type="text" name="groupe" value="<?= $array['group_id']?>">
    </label>
  </p>
  <input type="hidden" name="id" value="<?= $array['id']?>">
  <input type="submit" name="" value="Mettre à jour ">
</form>

<?php $this->stop('main_content') ?>
