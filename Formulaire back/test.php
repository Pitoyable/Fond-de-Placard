<?php
try {
  $bdd = new PDO("mysql:host=localhost;dbname=fond_de_placard", "root", "",
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);
} catch (Exception $e) {
  die($e->getMessage());
}

//Faire correspondre la selection d'ingredient avec les recettes disponible

//Lier les tables recette/ingredient/recette ingredient et etapes
$sql = "SELECT
ingredient.id AS ingredientId,
ingredient.name AS ingredientName,
ingredient_recipe.id AS inReId,
ingredient_recipe.recipe_id AS inRe_recipeId,
ingredient_recipe.ingredient_id AS inRe_ingredientId,
ingredient_recipe.quantity AS inRe_quantity,
recipe.id AS recipeId,
recipe.name AS recipeName
FROM ingredient_recipe
INNER JOIN ingredient ON ingredient.id = ingredient_recipe.ingredient_id
INNER JOIN recipe ON recipe.id = ingredient_recipe.recipe_id";

$affichageTest = $bdd->query($sql)->fetchAll();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title></title>
  </head>
  <body>
    <table>
      <thead>
        <th>Recipe ID</th>
        <th>Recipe Name</th>
        <th>Ingredient ID</th>
        <th>Ingredient Name</th>
        <th>InRe ID</th>
        <th>InRe Recipe ID</th>
        <th>InRe Ingredient ID</th>
        <th>InRe Quantity</th>
      </thead>
      <tr>
        <td>ID de la recette</td>
        <td>Nom de la recette</td>
        <td>ID de l'ingredient</td>
        <td>Nom de l'ingredient</td>
        <td>ID de InRe</td>
        <td>ID de la recette dans la table InRe</td>
        <td>ID de l'ingredient dans la table InRe</td>
        <td>Quantité dans InRe</td>
      </tr>
      <?php for ($i=0; $i < count($affichageTest) ; $i++) { ?>
        <tr>
          <td><?php echo $affichageTest[$i]['recipeId'] ?></td>
          <td><?php echo $affichageTest[$i]['recipeName'] ?></td>
          <td><?php echo $affichageTest[$i]['ingredientId'] ?></td>
          <td><?php echo $affichageTest[$i]['ingredientName'] ?></td>
          <td><?php echo $affichageTest[$i]['inReId'] ?></td>
          <td><?php echo $affichageTest[$i]['inRe_recipeId'] ?></td>
          <td><?php echo $affichageTest[$i]['inRe_ingredientId'] ?></td>
          <td><?php echo $affichageTest[$i]['inRe_quantity'] ?></td>
        </tr>
      <?php } ?>

    </table>
  </body>
</html>
