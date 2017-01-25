<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<div class="container">
  <h1>Administration</h1>
  <a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
  <a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
  <a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>


  <h2>Theme</h2>
  <!-- Boucle sur les utilisateurs -->
    <form class="" action="<?= $this -> url('Administration_addTheme') ?>" method="post">
      <label for="">Nom :
        <input type="text" name="name" value="">
      </label>
      <input type="submit" name="" value="Ajouter">
    </form>
  <?php
  for ($i=0; $i <count($array) ; $i++) { ?>
      <section>
        <h3><?= $array[$i]['the_name'] ?></h3>
      </section>
      <form class="" action="<?= $this -> url('Administration_editTheme') ?>" method="post">
        <label for="">
          <input type="submit" name="" value="modifier">
          <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
        </label>
      </form>
      <form class="" action="<?= $this -> url('Administration_deleteTheme') ?>" method="post">
        <label for="">
          <input type="submit" name="" value="supprimer">
          <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
        </label>
      </form>
  <?php } ?>
</div>
<?php $this->stop('main_content') ?>
