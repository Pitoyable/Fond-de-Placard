<?php $this->layout('layout', ['title' => 'Ajouter une recette']) ?>

<?php $this->start('main_content') ?>


<!-- Partie ingredients en autoComple -->
<div class="search_recipe">

  <form class="search_bar" action="" method="post">

    <p>
      <label for="">Ingredient : </label>
      <input type="text" name="search_bar" class="input_search" value="" placeholder="Ingredient">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </p>

    <div>
      <ul class="auto_complete">

      </ul>
    </div>

</div>
<!-- Fin de partie en autoComple -->

<!-- Debut de partie de la création de recette -->
<form action="<?= $this->url('Recipe_written') ?>" method="post">

  <div class="liste_ing_select">

  </div>

  <p>
    <label for="">Thème : </label>
    <select class="" name="">
      <?= $themes ?>
    </select>
  </p>

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
<!-- Fin de partie de création de recette -->

<?php $this->stop('main_content') ?>
