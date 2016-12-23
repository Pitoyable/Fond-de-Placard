<?php include("../page/init.php");

var_dump($_POST);

$recipe_id = $_POST['recipe_id'];
$ingredient_id = $_POST['ingredient_id'];


$sql = "DELETE FROM ingredient_recipe WHERE recipe_id = $recipe_id AND ingredient_id = $ingredient_id ";
$instance->exec($sql);


header('location:ingredient_recipe.php');
