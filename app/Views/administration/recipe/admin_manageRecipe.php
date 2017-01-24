<?php $this->layout('layout', ['title' => 'Administration']) ?>

<?php $this->start('main_content') ?>
<h1>Administration</h1>
<a href="<?= $this -> url('Administration_manageUser') ?>">Gestion des utilisateurs</a>
<a href="<?= $this -> url('Administration_manageRecipe') ?>">Validation des recettes</a>
<a href="<?= $this -> url('Administration_manageTheme') ?>">Gestion des thèmes</a>

  <h2>Recette valide</h2>
  <!-- Boucle sur les utilisateurs -->
  <?php
  for ($i=0; $i <count($array) ; $i++) {
    if($array[$i]['rec_valide'] == 1) { ?>
      <section>
        <h1><?= $array[$i]['rec_name'] ?></h1>
        <h2><?= $array[$i]['rec_type'] ?></h2>
        <p><?= $array[$i]['rec_html'] ?></p>
      </section>
      <form class="" action="<?= $this -> url('Administration_editRecipe') ?>" method="post">
        <label for="">
          <input type="submit" name="" value="modifier">
          <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
        </label>
      </form>
      <form class="" action="<?= $this -> url('Administration_deleteRecipe') ?>" method="post">
        <label for="">
          <input type="submit" name="" value="supprimer">
          <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
        </label>
      </form>
    <?php }
  } ?>

  <h2>Recette non valide</h2>
  <?php
  for ($i=0; $i <count($array) ; $i++) {
    if($array[$i]['rec_valide'] == 0) { ?>
      <section>
        <h1><?= $array[$i]['rec_name'] ?></h1>
        <h2><?= $array[$i]['rec_type'] ?></h2>
        <p><?= $array[$i]['rec_html'] ?></p>
      </section>
      <form class="" action="<?= $this -> url('Administration_editRecipe') ?>" method="post">
        <label for="">
          <input type="submit" name="" value="modifier">
          <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
        </label>
      </form>
      <form class="" action="<?= $this -> url('Administration_deleteRecipe') ?>" method="post">
        <label for="">
          <input type="submit" name="" value="supprimer">
          <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
        </label>
      </form>
      <form class="" action="<?= $this -> url('Administration_validateRecipe') ?>" method="post">
        <label for="">
          <input type="submit" name="" value="valider recette">
          <input type="hidden" name="id" value="<?=$array[$i]['id'] ?>">
        </label>
      </form>
    <?php }
  } ?>
<?php $this->stop('main_content') ?>
