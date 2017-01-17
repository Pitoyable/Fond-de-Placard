<?php
namespace Model;

use \W\Model\Model;

class RecipeModel extends \W\Model\Model
{

  //Function pour l'auto complementation des ingredients (AJAX)
  public function autoFindIngredient() {

  }

  //Trouver l'ingredients rechercher et stockage dans $_SESSION['ingredients']
  public function findIngredient() {

    //Instance du Model RecipeModel Pour avoir accés au method de Model
    $model = new RecipeModel();


    //Creation d'un tableau pour la method search();
    $array = array(
      "ing_name" => $_POST['search_bar'],
    );

    //Utilisation de la method setTable() pour chercher dans la table ingredients
    $model -> setTable('ingredients');

    //Utilisation de la method search()
    $ingFind = $model -> search($array);

    //return du resultat
    return $ingFind;
  }

  //Trouver les recettes avec les conditions ($_SESSION['ingredients'], type)
  public function findRecipe() {


  }




}
