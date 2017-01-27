<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>
<?php $this->start('main_content') ?>
<div class="container">

  <?php if (!empty($_POST['RecipeId'])) { ?>

    <section class="recipe_selected">

      <?php if (!empty($_SESSION['user'])) { ?>
      <form class="add_favoris" action="<?= $this -> url('Recipe_add_favoris') ?>" method="post">
        <input type="hidden" name="recipeId" value="<?= $recipeId ?>">
        <p>
          <label for="favoris">Ajouter au favoris : </label>
          <button type="submit" name="favoris"><i class="fa fa-star-o" aria-hidden="true"></i></button>
        </p>
      </form>
      <?php } ?>

      <?= $recipeName ?>
      <?= $recipeType ?>
      <?= $recipeHtml ?>

    </section>

  <?php } else { ?>
    <p>Aucun recette selectionner</p>
  <?php } ?>

</div>
<?php $this->stop('main_content') ?>
