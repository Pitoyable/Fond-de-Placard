<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<<<<<<< HEAD
<h1>Administration</h1>
<a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
<a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
<a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>

<form class="" action="<?= $this -> url('Administration_updateTheme')?>" method="post">
  <label for="">
    <input type="text" name="name" value="<?= $array['the_name'] ?>">
  </label>
  <input type="submit" name="" value="mise à jour">
  <input type="hidden" name="id" value="<?= $array['id'] ?>">
</form>
=======
<div class="container admin-nav">
>>>>>>> 4e53e5fe796c32d2a3ce6333c5ff1667baa5f5d4

  <div class="ribbon both_ribbon">
    <h1>Administration</h1>
  </div>

  <a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
  <a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
  <a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>
  <form class="" action="<?= $this -> url('Administration_updateTheme')?>" method="post">
    <label for="">
      <input type="text" name="name" value="<?= $array['the_name'] ?>">
    </label>
    <input type="submit" name="" value="mise à jour">
    <input type="hidden" name="id" value="<?= $array['id'] ?>">
  </form>

</div>
<?php $this->stop('main_content') ?>
