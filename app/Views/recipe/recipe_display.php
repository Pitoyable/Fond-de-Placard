<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>

<?php $this->start('main_content') ?>
<h1>J'ai faim</h1>

<div class="search_recipe">

  <form class="search_bar" action="" method="post">

    <p>
      <input type="text" name="search_bar" value="">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </p>

  </form>

</div>

<!-- Section pour le panier -->

<div class="paniertest">
  <!-- Affichage des ingredients -->
  <!-- Création d'un formulaire en dur pour tester les Methods, remplacer par l'ajax par la suite -->
  <form class="panier" action="index.html" method="post">


    <input class="submitPanier" type="submit" name="search_recipe" value="Trouver Une recette !">

  </form>

</div>
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
<?php $this->stop('main_content') ?>
