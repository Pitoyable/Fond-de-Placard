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

      <textarea name="recipe_content" rows="50" cols="80">

      <h3 data-mce-style="padding-left: 30px;" style="padding-left: 30px;"><span style="text-decoration: underline;" data-mce-style="text-decoration: underline;">Détails :</span></h3><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">- Nombre de personne :&nbsp;</p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">- Temps de préparation&nbsp;:&nbsp;</p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">- Temps de cuisson&nbsp;:&nbsp;</p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">&nbsp;<br></p><h3 style="text-align: left; padding-left: 30px;" data-mce-style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;" data-mce-style="text-decoration: underline;">Ingrédients :</span></h3><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">- Ingrédient n°1<br></p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">- Ingrédient n°2</p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">- Ingrédient n°3</p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">- Ingrédient n°4</p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">&nbsp;<br></p><h3 style="padding-left: 30px;" data-mce-style="padding-left: 30px;"><span style="text-decoration: underline;" data-mce-style="text-decoration: underline;">Préparation :</span></h3><p><span style="text-decoration: underline;" data-mce-style="text-decoration: underline;"><br data-mce-bogus="1"></span></p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;" data-mce-style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p><p style="padding-left: 90px;" data-mce-style="padding-left: 90px;">Détails de l'étape n°1</p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">&nbsp;<br></p><p data-mce-style="padding-left: 60px;" style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p><p data-mce-style="padding-left: 90px;" style="padding-left: 90px;">Détails de l'étape n°2</p><p style="padding-left: 30px;" data-mce-style="padding-left: 30px;">&nbsp;<br></p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p><p style="padding-left: 90px;" data-mce-style="padding-left: 90px;">Détails de l'étape n°3</p><p style="padding-left: 90px;" data-mce-style="padding-left: 90px;">&nbsp;<br></p><h3 style="padding-left: 30px;" data-mce-style="padding-left: 30px;"><span style="text-decoration: underline;" data-mce-style="text-decoration: underline;">Conseil, Astuce :&nbsp;</span></h3><p style="padding-left: 30px;" data-mce-style="padding-left: 30px;">&nbsp;<br></p><p style="padding-left: 60px;" data-mce-style="padding-left: 60px;">Petit conseil ou astuce en supplément !</p>

      </textarea>
      <input type="submit" name="add_recipe" class="submitPanier submitcreate" value="Envoyer">
    </div>

  </form>
  <!-- Fin de partie de création de recette -->
</div>

<?php $this->stop('main_content') ?>
