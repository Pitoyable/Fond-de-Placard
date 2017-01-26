<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>

<?php $this->start('main_content') ?>
<div class="container">
  <div class="ribbon both_ribbon">
    <h1>J'ai faim</h1>
  </div>
  <div class="search_recipe">
    <p><em>Trouvez une recette en fonction de vos ingrédients ! Ajouter un ingrédient dans votre panier grâce à la barre de recherche et une fois que votre panier est prêt cliquez sur trouver une recette.</em></p>

    <form class="search_bar search" action="" method="post">
      <input type="text" name="search_bar" class="input_search" value="" placeholder="Ex : ananas, asperge, banane...">

      <ul class="auto_complete results">
      </ul>

      <button type="submit"><i class="fa fa-plus" aria-hidden="true"></i><span> Ajouter</span></i></button>
    </form>

  </div>


  <!-- Section pour le panier -->

  <div class="paniertest login-box">
    <!-- Affichage des ingredients -->
    <!-- Création d'un formulaire en dur pour tester les Methods, remplacer par l'ajax par la suite -->
    <div class="lb-header panier-header">
      <h3>Mon panier</h3>
      <!-- Button pour vider la liste des ingredients du panier -->
      <button type="button" name="button" class="delete_panier">
        <p><i class="fa fa-trash" aria-hidden="true"></i></p>
      </button>
    </div>
    <form class="panier" action="" method="post">
      <!-- Partie pour le panier -->
      <div class="liste_ing_select">
      </div>

      <input class="submitPanier" type="submit" name="search_recipe" value="Trouver Une recette !">
    </form>
  </div>
  <?php if(!empty($_SESSION))  { ?>
    <p><a href="<?= $this -> url('Recipe_written') ?>"> Ajouter une recette</a></p>
    <?php } ?>
  <!-- Les containers seront masqués de base et seront visibles en fonction de la recherche -->
  <div class="content_recipe">
    <div class="starter">
      <div class="ribbon left_ribbon">
        <h3>Les entrées</h3>
      </div>
      <form class="form_starter" action="<?= $this -> url('Recipe_show') ?>" method="post">

      </form>
    </div>
    <div class="main_dish">
      <div class="ribbon left_ribbon">
        <h3>Les plats</h3>
      </div>
      <form class="form_main_dish" action="<?= $this -> url('Recipe_show') ?>" method="post">

      </form>
    </div>
    <div class="dessert">
      <div class="ribbon left_ribbon">
        <h3>Les desserts</h3>
      </div>
      <form class="form_dessert" action="<?= $this -> url('Recipe_show') ?>" method="post">

      </form>
    </div>
  </div>
</div> <!-- fin container -->
<?php $this->stop('main_content') ?>
