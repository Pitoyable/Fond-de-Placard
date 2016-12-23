<?php include("page/init.php");

var_dump($_POST);

$recipe_id = $_POST['recipe_id'];
$ingredient_id = $_POST['ingredient_id'];


$requete = $instance->prepare("DELETE FROM 'ingredient_recipe WHERE recipe_id = ? AND ingredient_id = ? ");
$requete ->execute(array($recipe_id, $ingredient_id ));


// header('location:ingredient_recipe.php');
