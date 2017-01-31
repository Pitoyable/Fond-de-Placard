<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>
<?php $this->start('main_content') ?>
<div class="container">

  <?php if (!empty($_POST['recipeId'])) { ?>

    <section class="recipe_selected">

      <?php if (!empty($_SESSION['user'])) { ?>
      
        <?php if ($favorisNumber === '1') { ?>
        <form class="add_favoris" action="<?= $this -> url('Recipe_add_favoris') ?>" method="post">
          <input type="hidden" name="recipeId" value="<?= $recipeId ?>">
          <p>
            <label for="favoris">Ajouter au favoris : </label>
            <button type="submit" name="favoris"><i class="fa fa-star-o favoris" aria-hidden="true"></i></button>
          </p>
        </form>
      <?php } else { ?>

        <form class="add_favoris" action="<?= $this -> url('Recipe_add_favoris') ?>" method="post">
          <input type="hidden" name="recipeId" value="<?= $recipeId ?>">
          <p>
            <label for="favoris">Ajouter au favoris : </label>
            <button type="submit" name="favoris"><i class="fa fa-star-o" aria-hidden="true"></i></button>
          </p>
        </form>
        <?php } ?>
      <?php } ?>

      <div class="ribbon both_ribbon">
        <h1><?= $recipeName ?></h1>
      </div>
      <h2>Créée par : <?= $pseudoUser ?></h2>
      <?= $recipeHtml ?>

    </section>

  <?php } else { ?>
    <p>Aucun recette selectionnée</p>
  <?php } ?>

</div>
<?php $this->stop('main_content') ?>
