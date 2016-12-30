<?php

//Connect to BDD fond de placard
try {
  $bdd = new PDO("mysql:host=localhost;dbname=fond_de_placard", "root", "",
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);
} catch (Exception $e) {
  die($e->getMessage());
}


//Affichage de la table recipe
  $sql = "SELECT * FROM recipe";
  $recipe = $bdd->query($sql)->fetchAll();

//Liaison des tables
  $sql = "SELECT *
  FROM link_ing_rec
  INNER JOIN recipe ON recipe.rec_id = link_ing_rec.recipe_rec_id
  INNER JOIN ingredients ON ingredients.ing_id =  link_ing_rec.ingredients_ing_id";

  $recipeJoin = $bdd->query($sql)->fetchAll();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <table>
      <thead>
        <th>rec_id</th>
        <th>rec_name</th>
        <th>rec_html</th>
        <th>rec_type</th>
        <th>rec_valide</th>
        <th>picture_pic_id</th>
      </thead>
      <?php for ($i=0; $i < count($recipe) ; $i++) { ?>
        <tr>
          <td><?php echo $recipe[$i]['rec_id'] ?></td>
          <td><?php echo $recipe[$i]['rec_name'] ?></td>
          <td><?php echo $recipe[$i]['rec_html'] ?></td>
          <td><?php echo $recipe[$i]['rec_type'] ?></td>
          <td><?php echo $recipe[$i]['rec_valide'] ?></td>
          <td><?php echo $recipe[$i]['picture_pic_id'] ?></td>
        </tr>
      <?php } ?>
      <tr>

      </tr>
    </table>

    <h1>Test</h1>

    <table>
      <thead>
        <th>rec_id</th>
        <th>rec_name</th>
        <th>rec_html</th>
        <th>rec_type</th>
        <th>rec_valide</th>
        <th>picture_pic_id</th>
        <th>ingredients_ing_id</th>
        <th>recipe_rec_id</th>
      </thead>
      <?php for ($i=0; $i < count($recipeJoin) ; $i++) { ?>
        <tr>
          <td><?php echo $recipeJoin[$i]['rec_id'] ?></td>
          <td><?php echo $recipeJoin[$i]['rec_name'] ?></td>
          <td><?php echo $recipeJoin[$i]['rec_html'] ?></td>
          <td><?php echo $recipeJoin[$i]['rec_type'] ?></td>
          <td><?php echo $recipeJoin[$i]['rec_valide'] ?></td>
          <td><?php echo $recipeJoin[$i]['picture_pic_id'] ?></td>
          <td><?php echo $recipeJoin[$i]['ingredients_ing_id'] ?></td>
          <td><?php echo $recipeJoin[$i]['recipe_rec_id'] ?></td>
        </tr>
      <?php } ?>
      <tr>

      </tr>
    </table>
  </body>
</html>
