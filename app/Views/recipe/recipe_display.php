<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>

<?php $this->start('main_content') ?>
<div class="container">
  <div class="ribbon both_ribbon">
    <h1>J'ai faim</h1>
  </div>
  <div class="search_panier">

    <div class="search_recipe">
      <p><em>Selectionnez un ingrédient parmi la base de données et ajoutez le au panier !</em></p>

      <form class="search_bar search" action="" method="post">
        <input type="text" name="search_bar" class="input_search" value="" placeholder="Ex : ananas, asperge, banane...">

        <ul class="auto_complete results">
        </ul>

        <button type="submit"><i class="fa fa-plus" aria-hidden="true"></i><span> Ajouter</span></i></button>
      </form>

    </div>


    <!-- Section pour le panier -->

    <div class="paniertest login-box" id="paniertest">
      <!-- Affichage des ingredients -->
      <!-- Création d'un formulaire en dur pour tester les Methods, remplacer par l'ajax par la suite -->
      <div class="lb-header panier-header">
        <h3>Mon panier</h3>
        <!-- Button pour vider la liste des ingredients du panier -->
        <p><i class="fa fa-trash delete_panier" aria-hidden="true"></i></p>
      </div>
      <form class="panier" action="" method="post">
        <!-- Partie pour le panier -->
        <div class="liste_ing_select">
        </div>

        <input class="submitPanier" type="submit" name="search_recipe" value="Trouver Une recette !">
      </form>
    </div>
  </div>
  <?php if(!empty($_SESSION))  { ?>
    <p class="addrecipe"><a href="<?= $this -> url('Recipe_written') ?>"> Ajouter une recette</a></p>
    <?php } ?>
  <!-- Les containers seront masqués de base et seront visibles en fonction de la recherche -->
  <div class="content_recipe">
    <div class="starter">
      <div class="ribbon left_ribbon">
        <h3>Les entrées</h3>
      </div>
      <form class="form_starter form_recipe" action="<?= $this -> url('Recipe_show') ?>" method="post"></form>
    </div>
    
    <div class="main_dish">
      <div class="ribbon left_ribbon">
        <h3>Les plats</h3>
      </div>
      <form class="form_main_dish form_recipe" action="<?= $this -> url('Recipe_show') ?>" method="post"></form>
    </div>

    <div class="dessert">
      <div class="ribbon left_ribbon">
        <h3>Les desserts</h3>
      </div>
      <form class="form_dessert form_recipe" action="<?= $this -> url('Recipe_show') ?>" method="post"></form>
    </div>
  </div>
</div> <!-- fin container -->
<?php $this->stop('main_content') ?>
