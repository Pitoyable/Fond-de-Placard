<?php
//variable de connexion
$user = "root";//nom d'utilisateur de labase de donnée.
$mdp = "";// Mot de passe de l'utilisateur.
$host = "localhost";// adress de la base de donnée.
$dbname = "fond_de_placard";// nom de la base de donnée.
//Connexion à la base de donnée.
try {
  //On instancie une nouvelle connexion PDO à la base de donnée
  $instance = new PDO("mysql:host=".$host.";dbname=".$dbname, $user, $mdp,
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  //array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') pour accepté les accent
  }catch (PDOException $e){
    //si il y a une erreur PHP (Exception) levée par PDO (PDOException) on l'affiche et on arrête le script.
  die('Erreur :'. $e->getMessage());
}

$sql = "SELECT recipe.name AS 'recipe.name', ingredient.name AS 'ingredient.name', recipe.id AS 'recipe.id', ingredient.id AS 'ingredient.id'
FROM ingredient_recipe
INNER JOIN ingredient ON ingredient_recipe.ingredient_id = ingredient.id
INNER JOIN recipe ON ingredient_recipe.recipe_id = recipe.id";

$resultat = $instance->query($sql)->fetchAll();
// var_dump($resultat);
var_dump($_POST);

if(!empty($_POST)){
  $recipe_id = $_POST['id_recipe'];
  $ingredient_id = $_POST['id_ingredient'];
  $quantity = $_POST['quantity'];
  $requete = $instance->prepare("INSERT INTO ingredient_recipe SET  recipe_id = ?, ingredient_id = ?, quantity = ? ");
  $requete ->execute(array($recipe_id, $ingredient_id, $quantity));

  $sql = "SELECT recipe.name AS 'recipe.name', ingredient.name AS 'ingredient.name', ingredient_recipe.quantity AS 'quantity', recipe.id AS 'recipe.id'
  FROM ingredient_recipe
  INNER JOIN ingredient ON ingredient_recipe.ingredient_id = ingredient.id
  INNER JOIN recipe ON ingredient_recipe.recipe_id = recipe.id
  WHERE recipe.id = 1
  ORDER BY ingredient_id ASC";
  $recette = $instance->query($sql)->fetchAll();
}

// var_dump($recette);
 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="master.css">
     <title></title>
   </head>
   <body>
     <form class="" action="" method="post">
       <select class="" name="id_recipe">
         <?php
          for($i=0; $i < count($resultat); $i++){
           if ($resultat[$i]['recipe.name'] != $name){ ?>
             <option value="<?php echo $resultat[$i]['recipe.id'] ?>">
               <?php echo $resultat[$i]['recipe.name'] ?>
             </option>
      <?php }
        $name = $resultat[$i]['recipe.name'];
       } ?>
       </select>
       <select class="" name="id_ingredient">
         <?php
         for($i=0; $i < count($resultat); $i++){
           if($resultat[$i]['ingredient.name'] != $name_ingredient){ ?>
             <option value=<?php echo $resultat[$i]['ingredient.id'] ?>>
               <?php echo $resultat[$i]['ingredient.name'] ?>
             </option>
           <?php }
           $name_ingredient = $resultat[$i]['ingredient.name'];
         } ?>
       </select>
       <label for="">Quantité : <input type="text" name="quantity" value=""></label>
       <input type="submit" name="valider" value="Valider">
     </form>
     <table>
       <tr>
         <th>Recette</th>
         <th>ingredient</th>
         <th>Quantité</th>
       </tr>
       <?php for($i=0; $i < count($recette); $i++ ){ ?>
         <tr>
           <th><?php echo $recette[$i]['recipe.name'] ?></th>
           <th><?php echo $recette[$i]['ingredient.name'] ?></th>
           <th><?php echo $recette[$i]['quantity'] ?></th>
         </tr>
      <?php  } ?>
     </table>
   </body>
 </html>
