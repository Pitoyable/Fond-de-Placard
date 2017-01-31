<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
  <div class="card_container">
    <a href="<?= $this -> url ('Recipe_display') ?>" class="card receipe">
      <div class="card-div">
        <h3>─ J'ai faim ─</h3>
        <p class="card-content">Trouver rapidemment une recette avec les ingrédients dont vous disposez !</p>
      </div>
    </a>

    <a href="<?= $this -> url ('Theme_display') ?>" class="card party">
      <div class="card-div">
        <h3>─ Soirée ─</h3>
        <p class="card-content">Envie d'organiser une soirée à thème ? C'est par ici ! Si vous sentez l'ennui vous gagner, venez voir les jeux ;) </p>
      </div>
    </a>

    <a href="<?= $this -> url ('Provide_display') ?>" class="card provide">
      <div class="card-div">
        <h3>─ Se fournir ─</h3>
        <p class="card-content">Il vous manque des oeufs? Du fromage? Consultez la liste des magasins dans le coin ! </p>
      </div>
    </a>

    <a href="<?= $this -> url ('Info_display') ?>" class="card contact">
      <div class="card-div">
        <h3>─ Nous contacter ─</h3>
        <p class="card-content">Qui sommes nous et comment nous contacter ?</p>
      </div>
    </a>
  </div>
<?php $this->stop('main_content') ?>
