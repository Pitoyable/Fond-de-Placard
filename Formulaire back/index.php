<?php
//connect BDD
try {
  $bdd = new PDO("mysql:host=localhost;dbname=fond_de_placard", "root", "",
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);
} catch (Exception $e) {
  die($e->getMessage());
}

//Affichage des etapes de la recette
if (!empty($_POST['choixrecette'])) {

  $sql2 = "SELECT stage.recipe_id, instruction, number, name, stage.id AS idStage
  FROM stage
  INNER JOIN recipe ON recipe.id = stage.recipe_id
  WHERE recipe.id =".$_POST['recetteid'];
  $listRecipeChoix = $bdd->query($sql2)->fetchAll();

}

//Affichage des recettes dans le select
$sql = "SELECT * FROM recipe";
$listRecipe = $bdd->query($sql)->fetchAll();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Etape de recipe</title>
  </head>
  <body>
    <form action="result.php" method="post">
      <p>Selection de la recette :
        <select class="" name="recipe_id">
          <?php for ($i=0; $i < count($listRecipe); $i++) { ?>
          <option value="<?php echo $listRecipe[$i]['id'] ?>"><?php echo $listRecipe[$i]['id']." ".$listRecipe[$i]['name'] ?></option>
          <?php } ?>
        </select>
      </p>
      <p>
        <label for="instruction">instruction de l'etape :</label>
        <textarea name="instruction" rows="8" cols="80"></textarea>
      </p>
      <p>
        <label for="number">Numero de l'etape :</label>
        <input type="number" name="number" value="">
      </p>
      <input type="submit" name="post_stage" value="envoyer">
    </form>

    <hr>

    <form action="index.php" method="post">
      <select name="recetteid">
        <?php for ($i=0; $i < count($listRecipe); $i++) { ?>
        <option value="<?php echo $listRecipe[$i]['id'] ?>"><?php echo $listRecipe[$i]['id']." ".$listRecipe[$i]['name'] ?></option>
        <?php } ?>
      </select>
      <input type="submit" name="choixrecette" value="Liste recette">
    </form>

    <?php if (!empty($_POST['recetteid'])) { ?>
      <table>
        <thead>
          <th>name</th>
          <th>recipe_id</th>
          <th>instruction</th>
          <th>number</th>
          <th>action</th>
        </thead>
        <?php for ($i=0; $i < count($listRecipeChoix); $i++) { ?>
          <tr>
            <td><?php echo $listRecipeChoix[$i]['name'] ?></td>
            <td><?php echo $listRecipeChoix[$i]['recipe_id'] ?></td>
            <td><?php echo $listRecipeChoix[$i]['instruction'] ?></td>
            <td><?php echo $listRecipeChoix[$i]['number'] ?></td>
            <td>
              <form action="result.php" method="post">
                <input type="submit" name="delete" value="delete">
                <input type="submit" name="update" value="update">
                <input type="hidden" name="id" value="<?php echo $listRecipeChoix[$i]['idStage'] ?>">
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    <?php } ?>
    <hr>
  </body>
</html>
