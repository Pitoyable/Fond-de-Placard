<?php include("page/init.php");

$sql = "SELECT recipe.name AS 'recipe.name', ingredient.name AS 'ingredient.name', recipe.id AS 'recipe.id', ingredient.id AS 'ingredient.id'
FROM ingredient_recipe
INNER JOIN ingredient ON ingredient_recipe.ingredient_id = ingredient.id
INNER JOIN recipe ON ingredient_recipe.recipe_id = recipe.id";

$resultat = $instance->query($sql)->fetchAll();
// var_dump($resultat);
var_dump($_POST);

if(isset($_POST['create'])){
  $ingredient_id = $_POST['id_ingredient'];
  $quantity = $_POST['quantity'];
  $recipe_id = $_POST['id_recipe'];
  $requete = $instance->prepare("INSERT INTO ingredient_recipe SET  recipe_id = ?, ingredient_id = ?, quantity = ? ");
  $requete ->execute(array($recipe_id, $ingredient_id, $quantity));

}
if(!empty($_POST)){
  $recipe_id = $_POST['id_recipe'];
  $sql = "SELECT recipe.name AS 'recipe.name', recipe.id As 'recipe.id' FROM recipe
  ";
  $recette = $instance->query($sql)->fetchAll();
}
var_dump($recette);
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
     <form class="formulaire" action="" method="post">
       <select class="" name="id_recipe">
         <?php
          for($i=0; $i < count($resultat); $i++){
           if ($resultat[$i]['recipe.name'] != $name || $i == 0){ ?>
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
           if($resultat[$i]['ingredient.name'] != $name_ingredient || $i == 0){ ?>
             <option value=<?php echo $resultat[$i]['ingredient.id'] ?>>
               <?php echo $resultat[$i]['ingredient.name'] ?>
             </option>
           <?php }
           $name_ingredient = $resultat[$i]['ingredient.name'];
         } ?>
       </select>
       <label for="">Quantité : <input type="text" name="quantity" value=""></label>
       <input type="submit" name="create" value="Valider">
     </form>
     <table>
       <tr>
         <th>Recette</th>
         <th>ingredient</th>
         <th>Quantité</th>
         <th>
           <form class="" action="" method="post">
             <select class="" name="id_recipe">
               <?php
               for($i=0; $i < count($resultat); $i++){
                 $name2 = $resultat[$i]['recipe.name'];
                 if ($resultat[$i]['recipe.name'] != $name2 || $i == 0){ ?>
                   <option value="<?php echo $resultat[$i]['recipe.id'] ?>">
                     <?php echo $resultat[$i]['recipe.name'] ?>
                   </option>
                   <?php }
                 } ?>
               </select>
               <input type="submit" name="valider" value="Valider">
             </form>
         </th>
       </tr>
       <?php
         if(!empty($_POST)){
           for($i=0; $i < count($recette); $i++ ){ ?>
             <tr>
               <td><?php echo $recette[$i]['recipe.name'] ?></td>
               <td><?php echo $recette[$i]['ingredient.name'] ?></td>
               <td><?php echo $recette[$i]['quantity'] ?></td>
               <td>

                 <form class="supprimer" action="delete.php" method="post">
                   <input type="hidden" name="recipe_id" value="<?php echo $recipe_id ?>">
                   <input type="hidden" name="ingredient_id" value=<?php echo $recette[$i]['ingredient.id'] ?>>
                   <button type="submit" name="button"  aria-hidden="true">supprimer</button>
                 </form>
               </td>
             </tr>
 <?php   }
            } ?>
     </table>
   </body>
 </html>
