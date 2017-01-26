<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>
<?php $this->start('main_content') ?>
<div class="container">

  <?php if (!empty($_POST['RecipeId'])) { ?>

    <section class="recipe_selected">

      <?= $recipeName ?>
      <?= $recipeType ?>
      <?= $recipeHtml ?>

    </section>

  <?php } else { ?>
    <p>Aucun recette selectionner</p>
  <?php } ?>

</div>
<?php $this->stop('main_content') ?>
