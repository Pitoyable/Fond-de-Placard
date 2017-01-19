<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
  <div class="card_container">
    <div class="card receipe">
      <h3>─ J'ai faim ─</h3>
      <p>Trouver rapidemment une recette avec les ingrédients que vous avez !</p>
    </div>
    <div class="card party">
      <h3>─ Soirée ─</h3>
      <p>Envie d'organiser une soirée à thème ? C'est par ici ! Si vous sentez l'ennui vous gagner, essayez nos jeux ;) </p>
    </div>
    <div class="card provide">
      <h3>─ Se fournir ─</h3>
      <p>Il vous manque des oeufs? Du fromage? Consultez la liste des magasins dans le coin ! </p>
    </div>
    <div class="card contact">
      <h3>─ Nous contacter ─</h3>
      <p>Qui sommes nous et comment nous contacter ?</p>
    </div>
  </div>
<?php $this->stop('main_content') ?>
