<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>

<?php $this->start('main_content') ?>
<div class="container">
  <h1>J'ai faim</h1>
  <div class="search_recipe">

    <form class="search_bar search" action="" method="post">
      <input type="text" name="search_bar" class="input_search" value="" placeholder="Ex : ananas, asperge, banane...">

      <ul class="auto_complete results">
      </ul>

      <button type="submit"><i class="fa fa-plus" aria-hidden="true"></i> Ajouter</i></button>
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
        <p>Vider !</p>
      </button>
    </div>
    <form class="panier" action="" method="post">
      <!-- Partie pour le panier -->
      <div class="liste_ing_select">
      </div>

      <input class="submitPanier" type="submit" name="search_recipe" value="Trouver Une recette !">
    </form>
  </div>
  <p><a href="<?= $this -> url('Recipe_written') ?>"> Ajouter une recette</a></p>
  <!-- Les containers seront masqués de base et seront visibles en fonction de la recherche -->
  <div class="content_recipe">
    <div class="starter">
      <h3>Les Entrées</h3>
      <!-- Ici se trouvera la liste des entrées -->
    </div>
    <div class="main_dish">
      <h3>Les Plats</h3>
      <!-- Ici se trouvera la liste des plats -->
    </div>
    <div class="dessert">
      <h3>Les Desserts</h3>
      <!-- Ici se trouvera la liste des desserts -->
    </div>
  </div>
</div> <!-- fin container -->
<?php $this->stop('main_content') ?>
