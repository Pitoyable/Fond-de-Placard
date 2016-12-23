<?php
include("../page/init.php");

$sql = "SELECT * FROM recipe";
$recette = $instance->query($sql)->fetchAll();
// var_dump($recette);

// var_dump($_POST);

if(!empty($_POST)){
  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $preparation = $_POST['preparation'];
  $cuisson = $_POST['cuisson'];
  $type = $_POST['type'];
  $personne = $_POST['personne'];

  $requete = $instance->prepare("INSERT INTO recipe (name, description, time_cook, time_baking, type, number_of_people) VALUES (?, ?, ?, ?, ?, ?)  ");
  $requete ->execute(array($nom, $description, $preparation, $cuisson, $type, $personne));

}
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
     <form class="" action="recipe.php" method="post">
       <p><label for="">Nom: <input type="text" name="nom" value=""></label></p>
       <p><label for="">Description : <input type="text" name="description" value=""></label></p>
       <p><label for="">temps de préparation <input type="text" name="preparation" value=""></label></p>
       <p><label for="">temps de cuisson <input type="text" name="cuisson" value=""></label></p>
       <p><label for="">type : <input type="text" name="type" value=""></label></p>
       <p><label for="">nombre de personne <input type="number" name="personne" value=""></label></p>
       <input type="submit" name="" value="valider">
     </form>
     <table>
       <tr>
         <th>Nom</th>
         <th>description</th>
         <th>temps de préparation</th>
         <th>temps de cuisson</th>
         <th>type</th>
         <th>nombres de personnes</th>
       </tr>
       <?php for($i=0; $i<count($recette); $i++) { ?>
         <tr>
           <td><?php echo $recette[$i]['name']?></td>
           <td><?php echo $recette[$i]['description']?></td>
           <td><?php echo $recette[$i]['time_cook']?></td>
           <td><?php echo $recette[$i]['time_baking']?></td>
           <td><?php echo $recette[$i]['type']?></td>
           <td><?php echo $recette[$i]['number_of_people']?></td>
           <td>
             <form class="" action="delete.php" method="post">
               <input type="hidden" name="id" value=<?php echo $recette[$i]['id']?>>
               <input type="submit" name="" value="effacer">
             </form>
           </td>
         </tr>
      <?php } ?>
     </table>
   </body>
 </html>
