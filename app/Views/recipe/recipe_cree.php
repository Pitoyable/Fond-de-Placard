<?php $this->layout('layout', ['title' => 'Ajouter une recette']) ?>

<?php $this->start('main_content') ?>

<div class="container">
  <p><a href="<?= $this -> url ('Recipe_display') ?>">Retour à J'ai Faim !</a></p>
  <h2>Ajouter une recette</h2>
  <!-- Partie ingredients en autoComple -->
  <div class="search_recipe">
    <form class="search_bar search" action="" method="post">
      <input type="text" name="search_bar" class="input_search" value="" placeholder="Ex : ananas, asperge, banane...">

      <ul class="auto_complete results">
      </ul>

      <button type="submit"><i class="fa fa-plus" aria-hidden="true"></i> <span> Ajouter</span></i></button>
    </form>
  </div>
  <!-- Fin de partie en autoComple -->

  <!-- Debut de partie de la création de recette -->
  <form action="<?= $this->url('Recipe_addWritten') ?>" method="post" class="creation">
    <h3>Ingrédients :</h3>
    <div class="liste_ing_select">
    </div>

    <div class="theme">
      <h3>Thèmes :</h3>
      <p>
        <label for="none">Aucun<input type="checkbox" name="mp_checked[]" value="none"></label>
        <?= $themes ?>
      </p>
    </div>

    <div class="writerecipe">
      <h3>La recette du chef !</h3>
      <p>
        <label for="nom">Titre de la recette : </label>
        <input type="text" name="nom" value="">
      </p>

      <p>
        <label for="type">Type de la recette : </label>
        <select name="type">
          <option value="entree">Entrée</option>
          <option value="plat">Plat</option>
          <option value="dessert">Dessert</option>
        </select>
      </p>

      <textarea name="recipe_content" rows="8" cols="80">
        <p>Bonjour</p>
        <ul>
          <li>Ingredients</li>
          <li>Ingredients</li>
          <li>Ingredients</li>
          <li>Ingredients</li>
          <li>Ingredients</li>
        </ul>
      </textarea>
      <input type="submit" name="add_recipe" class="submitPanier submitcreate" value="Envoyer">
    </div>

  </form>
  <!-- Fin de partie de création de recette -->
</div>

<?php $this->stop('main_content') ?>
