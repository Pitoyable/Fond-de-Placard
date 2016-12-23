<?php include("../page/init.php");

var_dump($_POST);

$id = $_POST['id'];


$sql = "DELETE FROM recipe WHERE id = $id";
$instance->exec($sql);


header('location:recipe.php');
