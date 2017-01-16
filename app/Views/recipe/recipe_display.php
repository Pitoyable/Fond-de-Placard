<?php $this->layout('layout', ['title' => 'J\'ai faim']) ?>

<?php $this->start('main_content') ?>
<h1>J'ai faim</h1>

<div class="search_recipe">
  <form class="search_bar" action="" method="post">
    <input type="text" name="search_bar" value="">
    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
  </form>
  <div class="checkbox">
    <label>
      <input type="checkbox" id="cbox1" value="starter">
      Entrée
    </label>

    <label>
      <input type="checkbox" id="cbox2" value="main_dish">
      Plat principal
    </label>

    <label>
      <input type="checkbox" id="cbox3" value="dessert">
      Dessert
    </label>
  </div>
</div>

<!-- Les containers seront masqués de base et seront visibles en fonction de la recherche -->
<div class="content_recipe">
  <div class="starter">
    <h3>Les entrées</h3>
    <!-- Ici se trouvera la liste des entrées -->
  </div>
</div>
<?php $this->stop('main_content') ?>
