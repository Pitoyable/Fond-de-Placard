<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>

<?php $this->start('main_content') ?>
<h1>J'ai faim</h1>

<div class="search_recipe">

  <form class="search_bar" action="<?php  ?>" method="post">

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
