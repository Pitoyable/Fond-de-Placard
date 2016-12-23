<?php
//connect BDD
try {
  $bdd = new PDO("mysql:host=localhost;dbname=fond_de_placard", "root", "");
} catch (Exception $e) {
  die($e->getMessage());
}

//Definition d'un message
$succes="";

//Confirmaton de l'ajout d'une etape
if (!empty($_POST['post_stage'])) {

  $insertStage = $bdd->prepare('INSERT INTO stage (recipe_id, instruction, number)
  VALUES (:recipe_id, :instruction, :number)');

  //Ajout de d'une etape
  $insertStage->execute(array(
  "recipe_id" => $_POST['recipe_id'],
  "instruction" => $_POST['instruction'],
  "number" => $_POST['number']
  ));

  //Ajout d'un contenue au message en cas de reussite
  if ($insertStage) {
    $succes="Insertion reussi";
  }
}

//Suppresion d'une etape
if (!empty($_POST['delete'])) {
  $deleteStage = $bdd->exec('DELETE FROM stage WHERE id='.$_POST['id']);

  //Ajout d'un contenue au message en cas de reussite
  if ($deleteStage) {
    $succes="Delete reussi";
  }
}

//Affichage de l'etape a modifier
if (!empty($_POST['update'])) {
  $sql = "SELECT * FROM stage WHERE id =".$_POST['id'];
  $stageUpdate = $bdd->query($sql)->fetch();
}

//Modification d'une etape
if (!empty($_POST['updateNow'])) {

  $update = $bdd->prepare("UPDATE stage
  SET recipe_id=:recipe_id,
      instruction=:instruction,
      number=:number
  WHERE id=:stageId");

  $update->execute(array(
    "recipe_id" => $_POST['recipe_id'],
    "instruction" => $_POST['instruction'],
    "number" => $_POST['number'],
    "stageId" => $_POST['stageId']
  ));

  //Ajout d'un contenue au message en cas de reussite
  if ($update) {
    $succes="Update reussi";
  }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
  </head>
  <body>
    <p><?php echo $succes; ?></p>
    <a href="index.php">Retour</a>
    <?php if (!empty($_POST['update'])) { ?>
      <form action="result.php" method="post">
        <p>
          <label for="recipe_id"> Recipe ID :</label>
          <input type="text" name="recipe_id" value="<?php echo $stageUpdate['recipe_id'] ?>">
        </p>
        <p>
          <label for="instruction">Instruction :</label>
          <textarea name="instruction" rows="8" cols="80"><?php echo $stageUpdate['instruction']?></textarea>
        </p>
        <p>
          <label for="number">Number :</label>
          <input type="number" name="number" value="<?php echo $stageUpdate['number'] ?>">
        </p>
        <input type="hidden" name="stageId" value="<?php echo $_POST['id'] ?>">
        <input type="submit" name="updateNow" value="Update">
      </form>
    <?php } ?>
  </body>
</html>
