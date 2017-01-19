<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>

<?php $this->start('main_content') ?>
<h1>J'ai faim</h1>

<div class="search_recipe">

  <form class="search_bar" action="<?php $this -> url('Recipe_display') ?>" method="post">

    <p>
      <input type="text" name="search_bar" value="">
      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
    </p>

  </form>

  <div class="checkbox">

    <p>
      <label>Entrée</label>
      <input type="checkbox" id="cbox1" value="starter">
    </p>

    <p>
      <label>Plat principal</label>
      <input type="checkbox" id="cbox2" value="main_dish">
    </p>

    <p>
      <label>Dessert</label>
      <input type="checkbox" id="cbox3" value="dessert">
    </p>

  </div>
</div>

<!-- Section pour le panier -->

<div class="panier">
  <!-- Affichage des ingredients -->
  <!-- Création d'un formulaire en dur pour tester les Methods, remplacer par l'ajax par la suite -->
  <form class="" action="index.html" method="post">

    <p>
      <label for="ail"></label>
      <input type="text" name="ail" value="ail">
    </p>

    <p>
      <label for="carotte"></label>
      <input type="text" name="carotte" value="carotte">
    </p>

    <input type="submit" name="search_recipe" value="Trouver Une recette !">
    
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
