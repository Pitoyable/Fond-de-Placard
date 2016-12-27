<?php
try {
  $bdd = new PDO("mysql:host=localhost;dbname=fond_de_placard", "root", "",
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);
} catch (Exception $e) {
  die($e->getMessage());
}

$sql = "SELECT * FROM ingredient";

$listIngredient = $bdd->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Jquery -->
    <script
      src="http://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

    <script src="js/master.js"></script>
    <link rel="stylesheet" href="css/master.css">
    <title>Fond de Placard</title>
  </head>
  <body>
    <div class="wrapper">
      <header>
        Bienvenue sur le site Fond de Placard ! Ce message est caché si tu l'as vu c'est que tu es un petit malin ;)
      </header>

      <nav class="navigation">
        <a class="selecteur"href="#">Sélecteur</a>
        <a href="#">Recettes</a>
        <img id="logo" src="pictures/logo02.png" alt="logo">
        <a href="#">Lexique</a>
        <a href="#">Info/Contact</a>
      </nav>

      <main>
        <div class="select-ingre">
          <div class="selector">
            <p id="vegetables">Légumes</p>
            <div class="dropdown">
              <p>Viande/Poisson</p>
              <div class="dropdown-content">
                <p id="meat">Viandes</p>
                <p id="fish">Poissons</p>
              </div>
            </div>
            <p id="fruits">Fruits</p>
            <p id="epicerie">Epicerie</p>
            <p id="laitage">Laitages</p>
            <p id="feculent">Féculents</p>
            <p id="pates">Pâtes</p>
          </div>
        </div>
        <div class="list-ingre">
          <div class="vegetables list">
            <?php for ($i=0; $i < count($listIngredient) ; $i++) { ?>
              <p>
                <label><?php echo $listIngredient[$i]['name'] ?>
                  <input type="checkbox" value="<?php echo $listIngredient[$i]['name'] ?>">
                </label>
              </p>
            <?php } ?>
          </div>
          <div class="meat list">
            <label><input type="checkbox" value="jambon">Jambon</label><br>
            <label><input type="checkbox" value="lardon">Lardon</label><br>
          </div>
          <div class="fruits list">
            <label><input type="checkbox" value="cerise">Cerise</label><br>
            <label><input type="checkbox" value="banane">Banane</label><br>
            <label><input type="checkbox" value="goyave">Goyave</label><br>
            <label><input type="checkbox" value="mangue">Mangue</label><br>
            <label><input type="checkbox" value="abricot">Abricot</label><br>
            <label><input type="checkbox" value="fraise">Fraise</label><br>
            <label><input type="checkbox" value="noix de coco">Noix de Coco</label><br>
          </div>
        </div>
        <div class="chalkboard">
          <ul id="basket" class="basket">

          </ul>
        </div>
      </main>

      <footer>
        <p><em>Bobby's Corp 2016 - Pour un monde meilleur</em></p>
      </footer>
    </div>
  </body>
</html>