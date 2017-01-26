<?php $this->layout('layout', ['title' => 'Ajouter une recette']) ?>
<?php $this->start('main_content') ?>

  <div class="container">
    <?php if (!empty($_SESSION['user']) && isset($recipeName) && isset($recipeType) && isset($recipeHtml)) { ?>

      <?= $recipeName ?>
      <?= $recipeType ?>
      <?= $recipeHtml ?>

    <?php } elseif (isset($erreur)) { ?>

      <?= $erreur ?>

    <?php } else { ?>

      <p>Vous n'avez rien à faire ici !</p>

    <?php } ?>
  </div>

<?php $this->stop('main_content') ?>
