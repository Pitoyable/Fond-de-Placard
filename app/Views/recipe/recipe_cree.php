<?php $this->layout('layout', ['title' => 'Ajouter une recette']) ?>

<?php $this->start('main_content') ?>

<form class="" action="<?= $this->url('Recipe_written') ?>" method="post">

  <p>
    <label for="nom">Titre de la recette : </label>
    <input type="text" name="nom" value="">
  </p>

  <p>
    <label for="type">Type de la recette : </label>
    <input type="text" name="type" value="">
  </p>

  <textarea name="recipe_content" rows="8" cols="80"></textarea>
  <input type="submit" name="add_recipe" value="Envoyer">

</form>

<?php $this->stop('main_content') ?>
