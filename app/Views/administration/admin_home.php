<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<div class="container admin-nav">
  <div class="ribbon both_ribbon">
    <h1>Administration</h1>
  </div>
  <a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
  <a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
  <a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>
</div>
<?php $this->stop('main_content') ?>
